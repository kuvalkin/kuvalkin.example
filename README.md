# Bitrix Module with REST/AJAX endpoint example
This is an example of a Bitrix module with a REST/AJAX endpoint. To use this module, clone this repository to your local/modules directory on your Bitrix server and install the module through the admin panel.

## Endpoints
This module exposes a single endpoint that allows you to retrieve the vowels from the name of a user by their ID.

### Access via AJAX
To access the endpoint via AJAX, use the following code:

```javascript
BX.ajax.runAction(
    'kuvalkin:example.User.gerUserNameVowels',
     {
        data: {
            id: <<put a user ID here>>
        }
    }
);
```

Please note that the action name is case-sensitive.

### Access via REST

To access the endpoint via REST, you must create an incoming webhook and give it access to a kuvalkin.example scope. You can do this via the "Developers" menu on your Bitrix site. The webhook URL will be in the following format:

```
https://your.domain/rest/<ID of the user that created the webhook>/<token>/
```

To send a GET request to the endpoint, use the following URL:
```
https://your.domain/rest/<ID of the user that created the webhook>/<token>/kuvalkin.example.User.getUserNameVowels?id=<<put a user ID here>>
```

Please note that the action name is case-sensitive.
