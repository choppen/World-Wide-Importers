CREATE TABLE productImages (
    fotoID int NOT NULL,
    productID int NOT NULL,
    foto LONGBLOB,
    PRIMARY KEY (fotoID),
    FOREIGN KEY (productID) REFERENCES stockitems(StockItemID)
);