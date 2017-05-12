AKUtils
=======

AKUtils is a collection of general tools. 

Current collection
------------------

### DBUtils

DBUtils is partly a wrapper for PDO but also a fluent API for creating
SQL-queries. This means that as a developer, you're able to chain method calls
to create SQL-queries in an intuitive manner.

#### Database

Database class is used for creating a database connection. Its' main purpose is
to serve different query classes with a PDO-connection.

Example:

```
$db = new Database();
$db->setHostname("localhost")
    ->setDatabaseName("baz")
    ->setUsername("foo")
    ->setPassword("bar")
    ->setDriver("mysql");
$connection = $db->getConnection();
```

#### Query-classes (SQLStatementInterface)

Database object can be used to instantiate query-classes. We can chain method
calls to do an Insert-statement.

Example:

```
$db->insert()->into("test")
    ->values(["name" => "Tommy Testman", "address" => "Road 12"])
    ->execute();
```

We could also do an Update or a Delete statement which always expect a filter
to match the affected rows.

Example:

```
$db->update()->setTable("test")
    ->setData(["animal" => "horse"])
    ->where("animal", Filter::EQUALS, "mule")
    ->execute();
```

Or do a delete.


```
$db->delete()->from("test")
    ->where("animal", Filter::EQUALS, "mule")
    ->execute();
```
