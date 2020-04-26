# /attributes `v0.1`

## Create New Attribute  `[POST]`

+ Request (application/json)

        {
            "category_id" : 1,
            "title" : "OS",
            "is_filter" : 1,
            "type" : "RADIO",
            "options" : [
                "Option1",
                "Option2",
                "Option3"
            ]
         }

+ Response 200 (application/json)

        {
            "data": {
                "id": 31,
                "category_id": 1,
                "title": "OS",
                "type": "RADIO",
                "is_filter": 1,
                "created_at": "2020-04-26T18:11:16.000000Z",
                "updated_at": "2020-04-26T18:11:16.000000Z",
                "options": [
                    {
                        "id": 14,
                        "title": "Option1",
                        "created_at": "2020-04-26T18:11:16.000000Z",
                        "updated_at": "2020-04-26T18:11:16.000000Z"
                    },
                    {
                        "id": 15,
                        "title": "Option2",
                        "created_at": "2020-04-26T18:11:16.000000Z",
                        "updated_at": "2020-04-26T18:11:16.000000Z"
                    },
                    {
                        "id": 16,
                        "title": "Option3",
                        "created_at": "2020-04-26T18:11:16.000000Z",
                        "updated_at": "2020-04-26T18:11:16.000000Z"
                    }
                ]
            }
        }
