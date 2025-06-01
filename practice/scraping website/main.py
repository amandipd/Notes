from bs4 import BeautifulSoup
import requests

html_text = requests.get(
    'https://m.timesjobs.com/mobile/jobs-search-result.html?txtKeywords=python&cboWorkExp1=-1&txtLocation=').text
soup = BeautifulSoup(html_text, 'lxml')
jobs = soup._find_all('li', class_='clearfix job-bx wht-shd-bx')

for job in jobs:
    # replaces whitespaces with nothing
    published_date = job.find('span', class_ = 'sim-posted').span.text
    if 'few' in published_date:
        company_name = job.find('h3', class_='joblist-comp-name').text.replace(' ', '')
        skills = job.find('span', class_='srp-skills').text.replace(' ', '')
        print(f"Company Name: {company_name.strip()}") # strip removes spaces
        print(f"Required Skills: {skills.strip()}")

    # print(skills)
    # print(company_name)
    # print(html_text) # prints textg
