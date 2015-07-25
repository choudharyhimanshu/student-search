# Himanshu Choudhary
# himanshuchoudhary@live.com
# https://bitbucket.org/himanshuchoudhary/

from bs4 import BeautifulSoup
import urllib2

LIMIT = 10
count = 0

while count < LIMIT:
    url = 'http://oa.cc.iitk.ac.in:8181/Oa/Jsp/OAServices/IITk_SrchStudRoll.jsp?recpos='+str(count)+'&selstudrol=&selstuddep=&selstudnam='
    page = urllib2.urlopen(url)
    soup = BeautifulSoup(page.read())
    anchors = soup.find_all('a')
    for i in range(len(anchors)-1) :
         roll_no = anchors[i].text.strip()
         student_url = 'http://oa.cc.iitk.ac.in:8181/Oa/Jsp/OAServices/IITk_SrchRes.jsp?typ=stud&numtxt='+roll_no+'&sbm='
         student_page = urllib2.urlopen(student_url)
         student_soup = BeautifulSoup(student_page.read())

         imgs = student_soup.find_all('img')
         student_info_div = student_soup.find('td',{'class' : 'TableContent'})
         student_info = student_info_div.find_all('p')

         photo = imgs[1]['src']
         name = (student_info[0].text.split(':'))[1].strip()
         program = (student_info[1].text.split(':'))[1].strip()
         department = (student_info[2].text.split(':'))[1].strip()
         hostel = (student_info[3].text.split(':'))[1].strip()
         mail = (student_info[4].text.split(':'))[1].strip()
         blood = (student_info[5].text.split(':'))[1].strip()
         gender = ((student_info[6].text.split(':'))[1].split())[0].strip()

    count += 12
