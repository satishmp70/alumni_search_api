# alumni_search_api


#To update a userʼs details, such as name, email, and location.

url :- 
http://localhost/alumni-search-api/routes/update_user.php

request : -  {"id" : 1, "name" : "John d", "email" : "john1@example.com", "latitude" : 40.7128, "longitude" : -74.0060}

response : -  {"success":true,"message":"User updated","data":[]}


# api :- Find alumni geographically close to the current
user, based on a specified radius.

url -: 
http://localhost/alumni-search-api/routes/find_alumni.php

request body : - 
{
    "latitude": -68.988800,
    "longitude": 109.581200,
    "radius": 50
}

response : - 

{
    "success": true,
    "message": "Nearby alumni found",
    "data": [
        {
            "id": 4,
            "name": "User_4",
            "email": "user4@example.com",
            "latitude": "-68.988800",
            "longitude": "109.581200",
            "distance": 0
        },
        {
            "id": 654976,
            "name": "User_654976",
            "email": "user654976@example.com",
            "latitude": "-69.058400",
            "longitude": "109.974300",
            "distance": 17.456922797724705
        },
        {
            "id": 190540,
            "name": "User_190540",
            "email": "user190540@example.com",
            "latitude": "-69.092300",
            "longitude": "109.202800",
            "distance": 18.946726299193134
        }
    ]
}



