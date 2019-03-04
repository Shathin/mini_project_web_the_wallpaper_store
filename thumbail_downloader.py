from bs4 import BeautifulSoup as bs
import urllib.parse
import urllib
from urllib.request import Request, urlopen, urlretrieve, URLopener
import os
import random
import math

def scrapper(url) :
    image_url_list = []
    request = Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    web_byte = urlopen(request).read()
    page = web_byte.decode('utf-8')
    soup = bs(page, 'html.parser') 
    images = soup.findAll('img', {'class' : 'thumbnail'})
    for image in images :
        image_url_list.append(fix_url(image['src']))
    return image_url_list

def fix_url(url) :
    new_url = 'https://hdqwalls.com' + url
    return new_url

def get_image_name(url) :
    return url.split('/')[-1]

def get_page_url(url, page_number) :
    return url + str(page_number)

if __name__ == "__main__" :
    os.chdir(os.getcwd() + "/images")
    url_list = [
        [ "https://hdqwalls.com/category/cars-wallpapers/page/", "Cars" ],
        [ "https://hdqwalls.com/category/nature-wallpapers/page/", "Nature" ],
        [ "https://hdqwalls.com/category/artist-wallpapers/page/", "Artist" ],
        [ "https://hdqwalls.com/category/tv-shows-wallpapers/page/", "Television" ],
        [ "https://hdqwalls.com/category/abstract-wallpapers/page/", "Abstract" ],
        [ "https://hdqwalls.com/category/animals-wallpapers/page/", "Animals" ],
        [ "https://hdqwalls.com/category/bikes-wallpapers/page/", "Bikes" ],
        [ "https://hdqwalls.com/category/sports-wallpapers/page/", "Sports" ],
        [ "https://hdqwalls.com/category/music-wallpapers/page/", "Music" ],
        [ "https://hdqwalls.com/category/anime-wallpapers/page/", "Anime" ],
        [ "https://hdqwalls.com/category/superheroes-wallpapers/page/", "Superheros" ]
        
    ]

    base_image_location = "assets/images/"
    max_page_number = 10
    for url_temp in url_list :
        print("Retrieving category ",url_temp[1])
        filename = url_temp[1] + ".txt"
        file = open(filename, "w")
        for page in range(1, max_page_number+1) :
            print("\tRetrieving page ",page," of category ", url_temp[1])
            url = get_page_url(url_temp[0], page)
            url_list = scrapper(url)
            for image_url in url_list :
                image_name = image_url.split('/')[-1]
                print("\t\tRetrieving image : ",image_name," . . . ")
                try :
                    request = Request(image_url, headers={'User-Agent': 'Mozilla/5.0'})
                    response = urlopen(request).read()
                    image = open(image_name, "wb")
                    image.write(response)
                    image.close()
                    # image location
                    image_location = base_image_location + image_name
                    # Write category, location and premium mark to file
                    print("\t\t\tWriting url to file . . .")
                    file.write(url_temp[1])
                    file.write(" , ")
                    file.write(image_location)
                    file.write(" , ")
                    if math.floor(random.random() * 10) < 5 :
                        file.write("Premium")
                    else :
                        file.write("")
                    file.write("\n")
                except Exception as e:
                    print("There was an error retreiving image ", image_name)
                    print(e)
        file.close()
    print("Done ... ")