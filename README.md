nasa
====
Before you start

    you can extend composer.json / add own libraries
    try to follow SOLID and DRY concepts

Main objectives:

    Create a new Bundle "NasaBundle" within the namespace "Neo"

    Create a default controller with a method helloAction
        under Nasa namespace
        for route /
        with a proper json return {"hello":"world!"}

    Use the api.nasa.gov
        the API-KEY is N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD
        documentation: https://api.nasa.gov/neo/?api_key=N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD

    Write a command
        to request the data from the last 3 days from nasa api
        response contains count of NEOs
        persist the values in your DB (mongoDB)
        Define the document as follows:
            date
            reference (neo_reference_id)
            name
            speed (kilometers_per_hour)
            is hazardous (is_potentially_hazardous_asteroid)

    Create a route /neo/hazardous
        display all DB documents which contain potentially hazardous asteroids
        format JSON

    Create a route /neo/fastest
        display a DB document data with the fastest asteroid
        format JSON

   
