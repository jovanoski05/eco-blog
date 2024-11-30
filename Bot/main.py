import datetime
import time
import requests
import pytz

from data_filtration import DataFiltration
from bot import Bot

dt = DataFiltration
bot = Bot

while (True):
   curr_time = datetime.datetime.now(pytz.timezone('Europe/Skopje'))
   data = dt.get_data_for_blog()

   if (curr_time.hour >= 21):
      text = Bot.get_report(data)
      print(text)

      obj = {"auth" : {
         "email" : "your_email@here.com",
         "API_Key" : "Your key here"
      },
         "content" : {
            "title" : "Air pollution report",
            "description" : "A quick report about the air pollution in Skopje",
            "text" : text
         }
      }

      x = requests.post("yourURL.com", json = obj)
      
      time.sleep(86400)
   else:
      time.sleep(60)
