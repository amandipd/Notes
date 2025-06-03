from bs4 import BeautifulSoup
import os

# constructs absolute path to the file home.html
file_path = os.path.join(os.path.dirname(__file__), "home.html")
with open(file_path, "r") as html_file:
    content = html_file.read()

    # creates Beautiful Soup object by parsing html content using lxml parser
    soup = BeautifulSoup(content, 'lxml')
    course_cards = soup.find_all('div', class_='card')
    for course in course_cards:
        # print(course.h5)  # grabs h5 tags
        course_name = course.h5.text
        course_price = course.a.text.split()[-1]

        print(f'{course_name} costs {course_price}')

    # print(soup.prettify()) prints in a pretty way

    # tags = soup.find('h5') # searches for the first element and stops the execution

    ''' Finds names of all courses that are with h5 tag

    courses_html_tags = soup.find_all('h5')  # outputs list of all h5 tags
    for course in courses_html_tags:
        print(course.text)
    '''

    # print(courses_html_tags) # prints whole list
