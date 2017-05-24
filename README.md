DBUtils
=======

DBUtils is partly a wrapper for PDO but also a fluent API for creating
SQL-queries. This means that as a developer, you're able to chain method calls
to create SQL-queries in an intuitive manner.

### Connection

First we have to define a connection. This means setting credentials, database
name, host etc. 

Maybe we want to setup a connection to a known MySQL-database:

```
use DBUtils\Connection\MySQLConnection;

$con = new MySQLConnection();
$con->setHostName("localhost")
    ->setPort(3306)
    ->setUsername("foo")
    ->setPassword("bar")
    ->setDatabaseName("baz");
```

Or we could create a SQLiteConnection:

```
use DBUtils\Connection\SQLiteConnection;

$con = new SQLiteConnection();
$con->setDatabasePath("/home/user/database.db");
```

### Database

Database-object is the most source of all database related actions. That means
creating, updating, dropping tables and also inserting, replacing, deleting and
updating rows. 

Database has a fluent API which means that as a developer you can chain method
calls to create statements without needing to worry about the semantics of
operating with PDO-objects.

#### Working with tables

You can create, update and drop tables using DBUtils API. Using fluent API is
very intuitive:

```
$db = new Database($con);
$db->table()->setTable("employees")
    ->addColumn("id", "INT", ["AUTO_INCREMENT", "PRIMARY KEY"])
    ->addColumn("first_name", "VARCHAR(255)", ["NOT NULL"])
    ->addColumn("last_name", "VARCHAR(255)", ["NOT NULL"])
    ->addForeignKey("unit_id", "unit", "id", ["ON DELETE SET NULL"])
    ->create();
    // we could also call update() or drop() which ever are case happens to be
```

#### Statement-classes

Database object can be used to instantiate statement-classes. Here we also make
use of fluent API. We can chain method calls to do an Insert-statement.

Example:

```
$db->insert()->into("test")
    ->values(["name" => "Tommy Testman", "address" => "Road 12"])
    ->execute();
```

We could also do an Update statement which always expect a filter
to match the affected rows.

Example:

```
$db->update("test")
    ->set(["animal" => "horse"])
    ->where("animal", Filter::EQUALS, "mule")
    ->execute();
```

Or do Delete.


```
$db->delete()->from("test")
    ->where("animal", Filter::EQUALS, "mule")
    ->execute();
```

As you can see, DBUtils API mimics SQL queries using same kind of keywords in
method calls. However, if your not familiar with SQL, it is possible to use
methods like setTable() and setData() to achieve the same goal.

Example:

```
$db->insert()
    ->setTable("test")
    ->setData(["name" => "Tommy Testman", "address" => "Road 12"])
    ->execute();

// Or update

$db->update()
    ->setTable("test")
    ->setData(["name" => "Tommy Testman", "address" => "Road 12"])
    ->where("id", Filter::EQUALS, 42)
    ->execute();
```
