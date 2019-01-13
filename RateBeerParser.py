import urllib.request
from bs4 import BeautifulSoup

class Sklep:
    def __init__(self, url, id):
        self.id = id
        self.url = url
        self.adress = ""
        self.name = ""
        self.piwka = []
        self.update()
        print(str(id))

    def update(self):
        page = get_content(self.url)
        self.adress = page.find("span", itemprop="streetAddress").text
        self.name = page.find("h1", itemprop="name").text
        table = page.find("table", class_="table striped")
        for i in range(1, len(table.contents)):
            self.piwka.append(Piwko(table.contents[i]))

    def to_csv(self):
        return

class Piwko:
    def __init__(self, unparsed_tag):
        tags = unparsed_tag.contents
        self.name = tags[0].text
        self.styl = tags[1].text
        self.abv = tags[2].text.replace("%", "")


def get_content(url):
    user_agent = 'Mozilla/5.0'
    headers = {'User-Agent': user_agent, }
    request = urllib.request.Request(url, None, headers)
    response = urllib.request.urlopen(request)
    data = response.read()
    return BeautifulSoup(data, 'html.parser')


url = "https://www.ratebeer.com/places/city/krakow/0/163/"
page = get_content(url)

divs = page.find_all("td", style="padding-bottom:30px;")
urls_str = []
for d in divs:
    a = d.contents[1].find('a')
    urls_str.append("https://www.ratebeer.com" + a.attrs['href'])

sklepy = []

for i in range(len(urls_str)):
    sklepy.append(Sklep(urls_str[i], i))

fsklepy = open("sklepy.csv", "w+")
for sklep in sklepy:
    fsklepy.write("" + str(sklep.id) + "," + str(sklep.name) + "," + str(sklep.adress) + "\n")
fsklepy.close()

fzawartosc = open("zawartosc.csv", "w+")
fpiwka = open("piwka.csv", "w+")
for sklep in sklepy:
    for piwko in sklep.piwka:
        fzawartosc.write("" + str(sklep.id) + "," + str(piwko.name) + "\n")
        fpiwka.write("" + str(piwko.name) + "," + str(piwko.styl) + "," + str(piwko.abv) + "\n")
fzawartosc.close()
fpiwka.close()

print("")

