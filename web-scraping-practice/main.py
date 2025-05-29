from bs4 import BeautifulSoup
import os

# statement that allows to open file and read its content

# constructs absolute path to the file home.html
file_path = os.path.join(os.path.dirname(__file__), "home.html")
with open(file_path, "r") as html_file:
    content = html_file.read()

    # creates Beautiful Soup object by parsing html content using lxml parser
    soup = BeautifulSoup(content, 'lxml')
    print(soup)