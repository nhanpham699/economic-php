<?php  
 // SET time_zone = '+00:00';
 $servername = 'localhost';
     $username = 'root';
     $password = '';
     $connect = mysqli_connect( $servername, $username, $password);
     $connect->query("use nshop_database");
     $create = "CREATE TABLE products(
          id int(5) AUTO_INCREMENT primary key,
          name varchar(50),
          price int(50),
          quantum int(50),
          image varchar(10),
          idKind varchar(10),
          color varchar(10)
     )";
     $connect->query($create);
      $create1 = "CREATE TABLE cart(
          id int(5) AUTO_INCREMENT primary key,
          name varchar(50),
          price int(50),
          quantum int(50),
          image varchar(10),
          idKind varchar(10),
          color varchar(10),
          iduser int(5)
     )";
     $connect->query($create1);
     $create_admin = "CREATE TABLE admin(
         id int(5) AUTO_INCREMENT primary key,
         username varchar(50),
         password varchar(30),
         profile varchar(30)
       )"; 
      $connect->query($create_admin);

      $create_orders = "CREATE TABLE orders(
         id int(5) AUTO_INCREMENT primary key,
         dateproducts datetime,
         nameproducts varchar(50),
         priceproducts int(30),
         statusproduct varchar(50),
         address varchar(50),
         phone varchar(50),
         note text(50),
         iduser int(5)
       )"; 
      $connect->query($create_orders); 
     //  $create2 = "CREATE TABLE detailorders(
     //      id int(5) AUTO_INCREMENT primary key,
     //      name varchar(50),
     //      price int(50),
     //      quantum int(50),
     //      image varchar(10),
     //      idKind varchar(10),
     //      color varchar(10),
     //      iduser int(5)
     // )";
     // $connect->query($create2);
 ?>    
