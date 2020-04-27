# /products `v0.1`

## Create New Product  `[POST]`

+ Request (application/json)

        {
            "category_id" : 1,
            "brand_id" : 1,
            "title" : "iPhone 11 Pro Max A2220",
            "details" : {
                "1" : 1,
                "2" : 5,
                "3" : 7,
                "4" : ["More Description"],
                "5" : ["hands-free", "beautiful box"],
                "6" : [12, 11],
                "7" : 0
            }
         }

+ Response 200 (application/json)

        {
            "data": {
                "id": 19,
                "title": "iPhone 11 Pro Max A2220",
                "avatar_path": null,
                "details": {
                    "OS": "android",
                    "RAM": "4GB",
                    "camera": "13mp",
                    "more description": [
                        "More Description"
                    ],
                    "other features": [
                        "hands-free",
                        "beautiful box"
                    ],
                    "communication networks": [
                        "4G",
                        "4.5G"
                    ],
                    "radio": "No"
                }
            }
        }
