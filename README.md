nasa
====
Before you start

    usage of Guzzle is allowed
    you can extend composer.json / add own libraries
    try to follow SOLID and DRY concepts

Test tasks:

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

    Test your application

Bonus tasks

    Consider the following code

    $str1 = 'foobardoo';
    $str2 = 'foo';
    if (strpos($str1, $str2)) {
        echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";
    } else {
        echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";
    }

    The output will be:

    "foobardoo" does not contain "foo"

    Why? How can this code be fixed to work correctly?

    Save your solution under bonusTasksSolutions.php

    How many elements contains the $_POST data after executing this request and why?

    // JavaScript, jQuery
    $.ajax({
        url: 'http://my.site/some/path',
        method: 'post',
        data: JSON.stringify({a: 'a', b: 'b'}),
        contentType: 'application/json'
    });

    Save your solution under bonusTasksSolutions.php

    Solve the statement. Write down your solution.

    A bread with butter cost 1.10 €. The bread is 1€ more expensive then the butter. How much does the butter cost?

    Save your solution under bonusTasksSolutions.php

    Go to app/config/config.yml and add the following yaml structure. (NOTICE: ping is a child-key of test)

    test:
      ping: pong

    write a command called test:command which accepts 1 argument id
        The command should check if a document with an id of the argument exists
        if document exists, return info "document exists"
        if document doesn't exist, return error "document doesn't exist"
        Add a propmpt for your command. Prompt text is "This is a test. Do you want to continue (y/N) ?"
        If you decline, return error "Nothing done. Exiting..."
        If you accept, run the command

