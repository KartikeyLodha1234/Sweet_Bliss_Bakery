-- Create Database
CREATE DATABASE IF NOT EXISTS bakery_db;
USE bakery_db;

-- Create Products Table
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Products
INSERT INTO products (name, description, category, price, stock, image_url) VALUES
('Golden Butter Croissant', 'Classic French croissant with layers of butter and crispy golden pastry. Perfect with your morning coffee.', 'Pastries', 3.99, 50, 'https://images.unsplash.com/photo-1751151856149-5ebf1d21586a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8R29sZGVuJTIwQnV0dGVyJTIwQ3JvaXNzYW50fGVufDB8fDB8fHww'),
('Decadent Dark Chocolate Cake', 'Rich, moist chocolate cake with silky chocolate frosting and a fudgy center. A chocolate lovers dream.', 'Cakes', 24.99, 20, 'https://images.unsplash.com/photo-1612294818293-242883203640?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fERlY2FkZW50JTIwRGFyayUyMENob2NvbGF0ZSUyMENha2V8ZW58MHx8MHx8fDA%3D'),
('French Vanilla Cupcake', 'Fluffy vanilla cupcake topped with creamy buttercream frosting and a hint of vanilla bean.', 'Cupcakes', 2.99, 30, 'https://images.unsplash.com/photo-1555420460-5551f716b44c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8VmFuaWxsYSUyMEN1cGNha2V8ZW58MHx8MHx8fDA%3D'),
('Rustic Sourdough Loaf', 'Handcrafted artisan sourdough bread with a crispy crust and tangy, chewy interior. Baked daily.', 'Breads', 5.99, 40, 'https://images.unsplash.com/photo-1744217083335-8b57ec3826ac?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8YXJ0aXNhbiUyMGJyZWFkfGVufDB8fDB8fHww'),
('Loaded Chocolate Chip Cookie', 'Soft, chewy cookie loaded with premium chocolate chips and a touch of sea salt.', 'Cookies', 1.99, 100, 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Q2hvY29sYXRlJTIwQ2hpcCUyMENvb2tpZXxlbnwwfHwwfHx8MA%3D%3D'),
('Herb Focaccia Bread', 'Italian-style focaccia infused with rosemary, olive oil, and sea salt. Soft and satisfying.', 'Breads', 4.99, 35, 'https://images.unsplash.com/photo-1711805064484-a77096f599a6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Rm9jYWNjaWElMjBCcmVhZHxlbnwwfHwwfHx8MA%3D%3D'),
('Classic NY Cheesecake', 'Creamy, dreamy New York cheesecake with a graham cracker crust. A timeless favorite.', 'Cakes', 28.99, 15, 'https://images.unsplash.com/photo-1611497438246-dcbb383de3c4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8TlklMjBDaGVlc2VjYWtlfGVufDB8fDB8fHww'),
('Almond-Topped Croissant', 'Buttery croissant crowned with sliced almonds and almond paste filling. Pure elegance.', 'Pastries', 4.99, 45, 'https://images.unsplash.com/photo-1710242835722-49f4e8a05fb6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8QWxtb25kJTIwQ3JvaXNzYW50fGVufDB8fDB8fHww'),
('Fresh Strawberry Tart', 'Delicate pastry shell filled with smooth custard and topped with fresh strawberries. Summer in a bite.', 'Tarts', 16.99, 25, 'https://images.unsplash.com/photo-1560529715-e891b32dd986?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fFN0cmF3YmVycnklMjBUYXJ0fGVufDB8fDB8fHww'),
('Garden Carrot Cake', 'Moist carrot cake with walnuts, pineapple, and signature cream cheese frosting swirls.', 'Cakes', 22.99, 18, 'https://images.unsplash.com/photo-1501437638401-4addcfd56d3d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8Q2Fycm90JTIwQ2FrZXxlbnwwfHwwfHx8MA%3D%3D'),
('Blueberry Burst Muffin', 'Tender muffin loaded with juicy blueberries and topped with a sweet crumble. Breakfast perfection.', 'Muffins', 3.49, 50, 'https://images.unsplash.com/photo-1607958996333-41aef7caefaa?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Qmx1ZWJlcnJ5JTIwTXVmZmlufGVufDB8fDB8fHww'),
('Wholesome Wheat Bread', 'Hearty whole wheat bread packed with nutrition. Nutty flavor and dense texture for a satisfying meal.', 'Breads', 4.49, 30, 'https://images.unsplash.com/photo-1549931319-a545dcf3bc73?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8V2hvbGUlMjBXaGVhdCUyMEJyZWFkfGVufDB8fDB8fHww'),
('Zesty Lemon Poppy Cake', 'Light and fluffy lemon cake with poppy seeds and a bright lemon glaze. Fresh and citrusy.', 'Cakes', 20.99, 22, 'https://images.unsplash.com/photo-1683989417038-2444068720da?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8TGVtb24lMjBQb3BweSUyMFNlZWQlMjBDYWtlfGVufDB8fDB8fHww'),
('Spiraled Cinnamon Roll', 'Soft, pillowy roll swirled with cinnamon sugar and topped with sweet cream cheese frosting.', 'Pastries', 3.99, 60, 'http://images.unsplash.com/photo-1583527976767-5399024eeb05?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Q2lubmFtb24lMjBSb2xsfGVufDB8fDB8fHww'),
('Colorful Macaron Box', 'Six delicate French macarons in assorted flavors including pistachio, raspberry, and matcha. An elegant treat.', 'Pastries', 12.99, 20, 'https://images.unsplash.com/photo-1702745572991-567d611bd678?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fE1hY2Fyb24lMjBBc3NvcnRtZW50fGVufDB8fDB8fHww'),
('Red Velvet Dream Cupcake', 'Elegant red velvet cupcake with tangy cream cheese frosting. Perfect for special occasions.', 'Cupcakes', 3.49, 35, 'https://images.unsplash.com/photo-1714386148315-2f0e3eebcd5a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8UmVkJTIwVmVsdmV0JTIwQ3VwY2FrZXxlbnwwfHwwfHx8MA%3D%3D'),
('Dark Rye Loaf', 'Dense, flavorful rye bread with a slight sweetness and subtle earthy notes. Traditional European style.', 'Breads', 5.49, 25, 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8UnllJTIwQnJlYWR8ZW58MHx8MHx8fDA%3D'),
('Black Forest Elegance', 'Luxurious chocolate cake with dark chocolate, fresh cherries, and whipped cream between layers. Decadent delight.', 'Cakes', 29.99, 12, 'https://images.unsplash.com/photo-1605807646983-377bc5a76493?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8QmxhY2slMjBGb3Jlc3QlMjBDYWtlfGVufDB8fDB8fHww'),
('Pistachio Cream Tart', 'Buttery pastry tart filled with creamy pistachio custard and garnished with crushed pistachios.', 'Tarts', 18.99, 20, 'https://images.unsplash.com/photo-1702745284678-aeb162be1380?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8UGlzdGFjaGlvJTIwVGFydHxlbnwwfHwwfHx8MA%3D%3D'),
('Marble Swirl Cake', 'Beautiful vanilla and chocolate swirl cake with a moist crumb and smooth frosting. A visual treat.', 'Cakes', 21.99, 28, 'https://images.unsplash.com/photo-1713025387177-ad42eb530242?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fE1hcmJsZSUyMENha2V8ZW58MHx8MHx8fDA%3D'),
('Velvety Mocha Cake', 'Moist chocolate sponge infused with espresso and layered with mocha cream frosting.', 'Cakes', 23.99, 16, 'https://images.unsplash.com/photo-1643102531425-dbd63fc87773?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fFZlbHZldHklMjBNb2NoYSUyMENha2V8ZW58MHx8MHx8fDA%3D'),
('Hazelnut Praline Pastry', 'Flaky pastry filled with hazelnut praline cream and topped with caramel drizzle.', 'Pastries', 4.49, 40, 'https://images.unsplash.com/photo-1585803059817-1e58abb814d0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8SGF6ZWxudXQlMjBQcmFsaW5lJTIwUGFzdHJ5fGVufDB8fDB8fHww'),
('Triple Chocolate Cookie', 'Chewy cookie packed with dark, milk, and white chocolate chunks.', 'Cookies', 2.49, 80, 'https://images.unsplash.com/photo-1629750413458-90c737a1c57b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8VHJpcGxlJTIwQ2hvY29sYXRlJTIwQ29va2llfGVufDB8fDB8fHww'),
('Raspberry Cream Cake', 'Light vanilla sponge layered with raspberry compote and whipped cream frosting.', 'Cakes', 25.99, 14, 'https://images.unsplash.com/photo-1694168755444-001d2c137800?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fFJhc3BiZXJyeSUyMENyZWFtJTIwQ2FrZXxlbnwwfHwwfHx8MA%3D%3D'),
('Caramel Pecan Tart', 'Buttery tart shell filled with caramel and topped with roasted pecans.', 'Pastries', 17.99, 22, 'https://images.unsplash.com/photo-1473340186413-a68ba9c2564e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fENhcmFtZWwlMjBQZWNhbiUyMFRhcnR8ZW58MHx8MHx8fDA%3D'),
('Oatmeal Raisin Cookie', 'Classic chewy cookie with oats, plump raisins, and a hint of cinnamon.', 'Cookies', 1.99, 90, 'https://images.unsplash.com/photo-1598968333180-9b4f6bc2bf52?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8T2F0bWVhbCUyMFJhaXNpbiUyMENvb2tpZXxlbnwwfHwwfHx8MA%3D%3D'),
('Tiramisu Delight Cake', 'Italian-inspired cake with espresso-soaked layers, mascarpone cream, and cocoa dusting.', 'Cakes', 27.99, 12, 'https://images.unsplash.com/photo-1622576890453-8e50b6f7d5b0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8VGlyYW1pc3UlMjBEZWxpZ2h0JTIwQ2FrZXxlbnwwfHwwfHx8MA%3D%3D'),
('Maple Walnut Pastry', 'Golden pastry filled with maple cream and sprinkled with toasted walnuts.', 'Pastries', 4.79, 35, 'https://images.unsplash.com/photo-1670941949362-4cd2b509158f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8TWFwbGUlMjBXYWxudXQlMjBQYXN0cnl8ZW58MHx8MHx8fDA%3D'),
('Peanut Butter Cookie', 'Soft cookie with rich peanut butter flavor and a crisscross top.', 'Cookies', 1.89, 100, 'https://images.unsplash.com/photo-1716392916280-e17fb5a2c191?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8UGVhbnV0JTIwQnV0dGVyJTIwQ29va2llfGVufDB8fDB8fHww'),
('Coconut Cream Cake', 'Fluffy sponge cake layered with coconut cream and topped with shredded coconut.', 'Cakes', 24.49, 18, 'https://images.unsplash.com/photo-1584468032442-d22740512124?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Q29jb251dCUyMENyZWFtJTIwQ2FrZXxlbnwwfHwwfHx8MA%3D%3D'),
('Apricot Danish Pastry', 'Buttery Danish pastry filled with apricot jam and glazed to perfection.', 'Pastries', 3.99, 50, 'https://images.unsplash.com/photo-1679941397930-57720f43338b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fEFwcmljb3QlMjBEYW5pc2glMjBQYXN0cnl8ZW58MHx8MHx8fDA%3D'),
('White Chocolate Cranberry Cookie', 'Sweet cookie with creamy white chocolate chunks and tart cranberries.', 'Cookies', 2.29, 75, 'https://images.unsplash.com/photo-1639390150902-8f1b3916e14b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fFdoaXRlJTIwQ2hvY29sYXRlJTIwQ3JhbmJlcnJ5JTIwQ29va2llfGVufDB8fDB8fHww'),
('Blackberry Cheesecake', 'Creamy cheesecake swirled with blackberry compote on a buttery crust.', 'Cakes', 26.99, 15, 'https://images.unsplash.com/photo-1663760888674-58493bcdb9bc?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8QmxhY2tiZXJyeSUyMENoZWVzZWNha2V8ZW58MHx8MHx8fDA%3D'),
('Almond Cream Pastry', 'Delicate puff pastry filled with almond cream and dusted with powdered sugar.', 'Pastries', 4.59, 40, 'https://images.unsplash.com/photo-1708199289046-798d7091b016?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8QWxtb25kJTIwQ3JlYW0lMjBQYXN0cnl8ZW58MHx8MHx8fDA%3D'),
('Double Fudge Cookie', 'Rich, chewy cookie bursting with chunks of fudgy chocolate.', 'Cookies', 2.19, 85, 'https://images.unsplash.com/photo-1595447966838-4539afd86068?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fERvdWJsZSUyMEZ1ZGdlJTIwQ29va2llfGVufDB8fDB8fHww'),
('Strawberry Shortcake', 'Layers of sponge cake, fresh strawberries, and whipped cream.', 'Cakes', 22.99, 20, 'https://images.unsplash.com/photo-1769655103034-6a8abfa7523b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fFN0cmF3YmVycnklMjBTaG9ydGNha2V8ZW58MHx8MHx8fDA%3D'),
('Puff Pastry Twists', 'Golden puff pastry twists with cinnamon sugar layers.', 'Pastries', 3.49, 60, 'https://images.unsplash.com/photo-1551239271-aed421a79754?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8UHVmZiUyMFBhc3RyeSUyMFR3aXN0c3xlbnwwfHwwfHx8MA%3D%3D'),
('Mint Chocolate Cookie', 'Refreshing mint flavor blended with rich chocolate chunks.', 'Cookies', 2.09, 70, 'https://images.unsplash.com/photo-1759455027980-be0fb861a06c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fE1pbnQlMjBDaG9jb2xhdGUlMjBDb29raWV8ZW58MHx8MHx8fDA%3D'),
('Cherry Almond Cake', 'Moist almond cake topped with cherries and almond glaze.', 'Cakes', 23.49, 17, 'https://images.unsplash.com/photo-1694168720027-5f2e02c59f14?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fENoZXJyeSUyMEFsbW9uZCUyMENha2V8ZW58MHx8MHx8fDA%3D'),
('Chocolate Éclair', 'Classic French éclair filled with chocolate cream and glazed with chocolate icing.', 'Pastries', 4.99, 30, 'https://images.unsplash.com/photo-1605302977039-0e242d4314ef?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fENob2NvbGF0ZSUyMCVDMyU4OWNsYWlyfGVufDB8fDB8fHww'),
('Snickerdoodle Cookie', 'Soft cinnamon-sugar cookie with a tender crumb.', 'Cookies', 1.79, 95, 'https://images.unsplash.com/photo-1703187839559-3ae0b51bd4f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8U25pY2tlcmRvb2RsZSUyMENvb2tpZXxlbnwwfHwwfHx8MA%3D%3D'),
('Pineapple Upside-Down Cake', 'Caramelized pineapple rings baked into a moist sponge cake.', 'Cakes', 21.99, 18, 'https://images.unsplash.com/photo-1761266483718-cb1350c59906?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8UGluZWFwcGxlJTIwVXBzaWRlJTIwRG93biUyMENha2V8ZW58MHx8MHx8fDA%3D'),
('Raspberry Danish', 'Flaky pastry filled with raspberry jam and topped with icing.', 'Pastries', 3.99, 45, 'https://images.unsplash.com/photo-1616031037015-4a6bc3b7fa3b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8UmFzcGJlcnJ5JTIwRGFuaXNofGVufDB8fDB8fHww'),
('Salted Caramel Cookie', 'Chewy cookie with gooey caramel and a sprinkle of sea salt.', 'Cookies', 2.39, 85, 'https://images.unsplash.com/photo-1661416957098-008659237e4e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fFNhbHRlZCUyMENhcmFtZWwlMjBDb29raWV8ZW58MHx8MHx8fDA%3D'),
('Mango Mousse Cake', 'Light sponge cake layered with tropical mango mousse.', 'Cakes', 24.99, 16, 'https://images.unsplash.com/photo-1622322076203-25ae52e5d0c5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8TWFuZ28lMjBNb3Vzc2UlMjBDYWtlfGVufDB8fDB8fHww'),
('Chocolate Croissant', 'Buttery croissant filled with rich chocolate and baked golden.', 'Pastries', 4.29, 50, 'https://images.unsplash.com/photo-1631129023315-7ef0e76faaed?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Q2hvY29sYXRlJTIwQ3JvaXNzYW50fGVufDB8fDB8fHww'),
('Ginger Molasses Cookie', 'Spiced cookie with ginger, molasses, and a chewy texture.', 'Cookies', 1.99, 80, 'https://images.unsplash.com/photo-1627388483909-3c712c62d834?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8R2luZ2VyJTIwTW9sYXNzZXMlMjBDb29raWV8ZW58MHx8MHx8fDA%3D'),
('Passionfruit Cheesecake', 'Creamy cheesecake with a tangy passionfruit glaze.', 'Cakes', 27.49, 14, 'http://images.unsplash.com/photo-1589648219334-23195fe1043d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8UGFzc2lvbmZydWl0JTIwQ2hlZXNlY2FrZXxlbnwwfHwwfHx8MA%3D%3D'),
('Apple Turnover', 'Flaky pastry pocket filled with spiced apple compote.', 'Pastries', 3.79, 55, 'https://images.unsplash.com/photo-1647797658735-a33e305946ec?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8QXBwbGUlMjBUdXJub3ZlcnxlbnwwfHwwfHx8MA%3D%3D');

-- Create Orders Table (optional)
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address VARCHAR(255),
    city VARCHAR(100),
    total DECIMAL(10, 2),
    status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Order Items Table (optional)
CREATE TABLE IF NOT EXISTS order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE users ADD COLUMN is_admin TINYINT(1) DEFAULT 0;
UPDATE users SET is_admin = 1 WHERE id = 1;