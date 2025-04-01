from fastapi import FastAPI
from movie_servixe.router import movie_router 


SERVICE_HOST_URL = 'http://localhost:8000/api/v1/movies'

app = FastAPI()

app.include_router(movie_router, prefix='/api/v1/movies', tags=['movies'])

