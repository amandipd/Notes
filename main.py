from bs4 import BeautifulSoup
import requests

# Generates Zillow URL link based on City and State


def genereate_zillow_url(city: str, state: str) -> str:
    city_formatted = city.strip().replace(' ', '-')
    state_abbr = state.strip().upper()
    return f"https://www.zillow.com/homes/for_rent/{city_formatted}-{state_abbr}/"


# DEBUG
# print(genereate_zillow_url("Berkeley", "CA"))

# Create header to mimic real browser and circumvent Zillow's bot protection
headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36'
}
html_text = requests.get(genereate_zillow_url(
    "Berkeley", "CA"), headers=headers).text
print(html_text)
