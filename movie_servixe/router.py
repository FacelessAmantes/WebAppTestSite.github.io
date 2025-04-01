from fastapi import APIRouter
from movie_servixe.models import MovieIn, MovieOut
import pandas as pd
import random
from fastapi.responses import HTMLResponse

# Генерация данных
first_names = ['Александр', 'Дмитрий', 'Сергей', 'Анастасия', 'Екатерина', 'Мария', 'Иван', 'Николай', 'Ольга', 'Татьяна']
last_names = ['Иванов', 'Петров', 'Сидоров', 'Кузнецов', 'Смирнов', 'Попов', 'Лебедев', 'Ковалев', 'Новиков', 'Морозов']
patronymics = ['Александрович', 'Дмитриевич', 'Сергеевич', 'Анастасиевна', 'Екатерининна', 'Мариевна', 'Иванович', 'Николаевич', 'Ольговна', 'Татьяновна']

data = {
    'id': range(1, 101),
    'Отчество': [random.choice(patronymics) for _ in range(100)],
    'Фамилия': [random.choice(last_names) for _ in range(100)],
    'Имя': [random.choice(first_names) for _ in range(100)],
}

# Создание датафрейма
test_df = pd.DataFrame(data)



fake_bd = pd.DataFrame(columns=['name','genre','actor'])

movie_router = APIRouter()



@movie_router.get('/', response_model=list[MovieOut])
def get_movies():
    response = []
    for index, movie in fake_bd.iterrows():
        response.append({'id':index, 'name':movie['name'], 'genre':movie['genre'], 'actor':movie['actor'] })
    
    return response


@movie_router.get('/html_test')
def get_movies():
    html_response = """
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
"""

    table_row = '\n'.join(['<td>{}</td>'.format(name) for name in test_df.columns])
    table_row = f'<tr>\n{table_row}\n</tr>\n'
    html_response += table_row

    for index, values in test_df.iterrows():
        table_row = '\n'.join(['<td>{}</td>'.format(value) for value in values.to_list()])
        table_row = f'<tr>\n{table_row}\n</tr>\n'
        html_response += table_row

    html_response += """
    </table>
    </body>
</html>"""

    return HTMLResponse(html_response)

@movie_router.post('/')
def add_movie(payload: MovieIn) -> MovieOut:
    movie_index =len(fake_bd.index) 
    payload_dict = dict(payload)
    fake_bd.loc[movie_index] = payload_dict
    response = payload_dict.copy() 
    response['id'] = movie_index
    return response

