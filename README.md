# Abstract
A demonstration of how NoSQL and GraphQL can be used in conjunction with SQL and REST to create a rich developer/user experience while maintaining backwards compatibility with the existing code base. Upgrading MariaDB to 10.3+ in conjunction with adding GraphQL support to the Laravel API will provide the features and flexibilty of the modern web without requiring administrators to maintain new servers or re-writing existing functionality. These technologies can augument our existing stack and would be entirely optional for developers to use at their own discretion – with guidance from the core team. 

## NoSQL 
### What is it?
NoSQL is an alternative to conventional relational databases (RDBMS) that is optimized for JSON document storage and retrevial. In a NoSQL database, records or *documents* are stored in what is essentially a large array called a collection. Documents within a collection are non-normalized meaning that while many NoSQL databases support joining collections to some degree, there are no relationship constraints such those in more traditional RDBMS. This is what allows NoSQL stores to have greater flexibilty while maintaining simpler schemas than their relational counterparts. The structure of any given document in a collection can be modified independently without affecting the rest. 

### Caveats
While NoSQL is best used for storing flattened data (key/value pairs), its benefits begin to break down when complex logic needs to be performed such as generating reports that perform heavy arithmatic accross collections. Additionally, many popular NoSQL solutions are not ACID compliant and do not have proper transaction support. 

### Why should we use it?
In order to match the flexibility of a NoSQL store, a relational database would have to be hypernormalized to the point where even table and columns names become dynamic. The overhead from this level of normalization would increase complexity to a degree that is too great for the majority of developers working on the platform. However, starting with MariaDB 10.3 there is now support for JSON column types. This allows developers to store both relational and non-relational data together in a way that reduces overall complexity while maintaining both flexibility and queryability. At this time MariaDB does not support the indexing of JSON columns, however with proper design, data that needs to non-normalized data can be stored and indexed using traditional relational database keys. In addition, Laravel's Eloquent ORM provides an abstraction layer for working with JSON column types. While it is still possible to use native SQL JSON functions, it provides its own simplified DSL on top of SQL to select and query nested JSON fields.

### Where could we use this flexibility?
- User Data [Elentra UDM]
- Applications [Elentra Admissions]
- Custom Fields [Elentra CPD]


## GraphQL
### What is it?
GraphQL is a descriptive and statically typed specification for querying resources from a server created by Facebook Inc. The idea behind GraphQL is that unlike a traditional REST API where the client must sometimes piece together data from multiple endpoints, the client instead makes a request to a single endpoint with the exact fields that it needs and only that data is returned. A GraphQL __schema__  consists of three major components: 

#### Types
GraphQL types are the blocks that define your GraphQL schema. Every GraphQL type can has attributes such as a *name*, *description* and *type*. GraphQL types are reusable and can be combined with other types as components to form complex aggregate types. For example:  A *UserType* can consist of an *AddressType* and a *ContactType* that each having their own set of field types. 

#### Queries
GraphQL queries define exactly what resources and fields a client that a client is able to request from the server. Queries are used to represet *read* operations and consist of five major components:
- Attributes such as the name and description
- The GraphQL type that the query returns
- Any arguments and their types
- Argument validation rules
- A resolver function that receives the arguments and returns a result

#### Mutations
GraphQL mutations are used to represent *write* operations and are defined with the same major components as queries.

### Caveats
Another layer in addition to REST and dependance on a 3rd party library for support.

### Why should we use it?
GraphQL provides a powerful, statically typed API for clients to interact with. It is more efficient and predictable than REST when it comes to large and complex queries as the client is required to specify exactly what it needs in return.     


### Where could we use this flexibility?
- Fetch Filtered Events
- Rotation Scheduler UI [Elentra ME]
- Lotteries Scheduler UIs [Elentra ME]
- Applications [Elentra Admissions]
- Custom Reports (Advanced Search) [Elentra CDP]

# TLDR; 


### Still to Investigate
- Upgrade path to MariaDB 10.3
- MariaDB 10.3/MySQL 8 JSON differences (Eloquent abstraction)
- GraphQL Auditing

### Technologies Used
- MongoDB
- MariaDB (10.3+)
- <a href="https://github.com/rebing/graphql-laravel">Laravel GraphQL [MIT]</a>
- <a href="laravel mongo db">Laravel MongoDB [MIT]</a>


## Running the Example
Make sure any development environments/servers that are using ports `3306`, `3000`, `3001`, `3002` are stopped. 
Run the following commands: 

`~$ docker-compose up`
<br>
`~$ docker exec -it demo bash`
<br>
`~# php artisan setup`

### Viewing the Example
You can view the example by navigating to `http://localhost:3000`
