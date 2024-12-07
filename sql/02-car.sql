CREATE TABLE car
(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    make TEXT NOT NULL,
    model TEXT NOT NULL,
    year INTEGER NOT NULL,
    price REAL NOT NULL,
    engine_capacity REAL NOT NULL,
    fuel_type TEXT NOT NULL,
    horsepower INTEGER NOT NULL,
    mileage INTEGER NOT NULL,
    transmission TEXT NOT NULL
);