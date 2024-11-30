import json
import requests


class DataFiltration:

  def get_data_for_blog():

    r = requests.get('https://skopje.pulse.eco/rest/data24h')

    new_data_set = []
    highest = -1
    smallest = 1000000

    posHighest = "Nan"
    posSmallest = "NaN"
    avg = 0

    sensor_id_highest = 0
    sensor_id_smallest = 0
    for i in r.json():
      if (i['type'] == 'pm10'):
        new_data_set.append(i)
        avg = avg + int(i['value'])

        if (int(i['value']) > highest):
          highest = int(i['value'])
          sensor_id_highest = i['sensorId']
          posHighest = i['position']

        if (int(i['value']) < smallest):
          smallest = int(i['value'])
          sensor_id_smallest = i['sensorId']
          posSmallest = i['position']

    avg = avg / len(r.json())

    return {'avg': avg, 'highest':highest, 'smallest':smallest, 'highest_sensor_id': sensor_id_highest, 'highest_position': posHighest, 'smallest_sensor_id': sensor_id_smallest, 'smallest_position':posSmallest}
