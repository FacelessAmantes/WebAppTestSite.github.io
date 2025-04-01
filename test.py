import requests


url = "http://localhost:8000/api/v1/movies/html_test"

requests.request('GET', url=url)

# import pandas as pd
# import random

# # Генерация данных
# first_names = ['Александр', 'Дмитрий', 'Сергей', 'Анастасия', 'Екатерина', 'Мария', 'Иван', 'Николай', 'Ольга', 'Татьяна']
# last_names = ['Иванов', 'Петров', 'Сидоров', 'Кузнецов', 'Смирнов', 'Попов', 'Лебедев', 'Ковалев', 'Новиков', 'Морозов']
# patronymics = ['Александрович', 'Дмитриевич', 'Сергеевич', 'Анастасиевна', 'Екатерининна', 'Мариевна', 'Иванович', 'Николаевич', 'Ольговна', 'Татьяновна']

# data = {
#     'id': range(1, 101),
#     'Отчество': [random.choice(patronymics) for _ in range(100)],
#     'Фамилия': [random.choice(last_names) for _ in range(100)],
#     'Имя': [random.choice(first_names) for _ in range(100)],
# }

# # Создание датафрейма
# test_df = pd.DataFrame(data)

# html_response = ''

# table_row = '\n'.join(['<td>{}</td>'.format(name) for name in test_df.columns])
# table_row = f'<tr>\n{table_row}\n</tr>\n'
# html_response = table_row

# for index, values in test_df.iterrows():
#     table_row = '\n'.join(['<td>{}</td>'.format(value) for value in values.to_list()])
#     table_row = f'<tr>\n{table_row}\n</tr>\n'
#     html_response += table_row

# print(html_response)