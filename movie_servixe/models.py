import pydantic 





class MovieIn(pydantic.BaseModel):

    name:str
    genre:list[str]
    actor:str
    

class MovieOut(MovieIn):
    id:int

