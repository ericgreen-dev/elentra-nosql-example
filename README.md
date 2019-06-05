```GraphQL
mutation UpdateUserContact {
    update_contact(
        user_id:12, 
        data: { 
            primary_email:"updates@test.ca", 
            primary_phone:"1234567890"
        }
    ) {
        data {
            primary_contact {
                primary_email,
                primary_phone
            }
        }
    }
}
```

```JSON
{
  "data": {
    "update_contact": {
      "data": {
        "primary_contact": {
          "primary_email": "updates@test.ca",
          "primary_phone": "1234567890"
        }
      }
    }
  }
}
```