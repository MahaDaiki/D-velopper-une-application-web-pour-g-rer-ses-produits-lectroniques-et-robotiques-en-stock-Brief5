USE electronacer_db;


-- @block
CREATE TABLE products (
     reference INT ,
     image_url VARCHAR(255),
     libelle VARCHAR(255) NOT NULL,
     unit_price DECIMAL(10, 2) NOT NULL,
     quantite_min INT NOT NULL,
     quantite_stock INT NOT NULL,
     categorie VARCHAR(40)
      );
-- @block
INSERT INTO users (username, password) VALUES
    ('testuser', 'test');

INSERT INTO users (username, password) VALUES 
    ('maha','123');
--@block
INSERT INTO products ( reference,image_url, libelle, unit_price, quantite_min, quantite_stock, categorie) VALUES
    (1,'ram1.jpg', 'Ram 8gb', 400, 2, 20, 'Ram'),
    (2,'ram2.jpg', 'Ram', 474, 2, 15, 'Ram'),
    (3,'ram3.jpg', 'Ram ', 400, 2, 20, 'Ram'),
    (4,'ram4.jpg', 'Ram', 474, 2, 15, 'Ram'),
    (5,'ram-ddr4-16gb-2x8gb-pc3000-rgb-cl16.jpg', 'Ram ddr4 16gb', 474, 2, 15, 'Ram'),
    (6,'emtec-disque-dur-ssd.jpg','emtec ssd', 900, 2, 20,'ssd'),
    (7,'emtec-power--ssd.jpg' ,'emtec power ssd', 900, 2, 2,'ssd'),
    (8,'kingston-25-ssd.jpg','king stone ssd',987,2,1,'ssd'),
    (9,'cooler-master-masterliquid.jpg','cooler',1232,2,2,'cooler'),
    (10,'thermaltake-floe-dx-water.jpg','thermaltake',2932,2,1,'cooler'),
    (11,'gaming-monitor.jpg','gaming monitor',1122,2,5,'monitor'),
    (12,'monitor-24-msi.jpg','mci monitor',3242,2,3,'monitor'),
    (13,'samsung-24-curvo.jpg','samsung monitor',5202,2,1,'monitor'),
    (14,'gaming-mouse-razer-trinity.jpg','trinity razer mouse ',600,2,3,'mouse'),
    (15,'gaming-viper-ultimate-razer-mouse.jpg','viper mouse',800,2,1,'mouse'),
    (16,'razer-mouse-mamba-elite.jpg','elite mouse',400,2,3,'mouse')
