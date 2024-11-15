<?php 
    function getAll_Products() {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM product");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function delete_product($id){
        $conn = connectdb();
        $stmt = $conn->prepare("DELETE FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    
    function getone_product($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $one_product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $one_product;
    }
    
    function update_product($id, $brand_id, $name_product, $selling_price, $import_price, $color, $display, $storage, $camera, $CPU, $battery, $image_path) {
        $conn = connectDB();
        $sql = "UPDATE product SET 
                    brand_id = :brand_id, 
                    name_product = :name_product, 
                    selling_price = :selling_price, 
                    import_price = :import_price, 
                    color = :color, 
                    display = :display, 
                    storage = :storage, 
                    camera = :camera, 
                    CPU = :CPU, 
                    battery = :battery, 
                    image = :image 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':selling_price', $selling_price);
        $stmt->bindParam(':import_price', $import_price);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':display', $display);
        $stmt->bindParam(':storage', $storage);
        $stmt->bindParam(':camera', $camera);
        $stmt->bindParam(':CPU', $CPU);
        $stmt->bindParam(':battery', $battery);
        $stmt->bindParam(':image', $image_path);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    


    // function insertProduct($brand_id, $name_product, $selling_price , $import_price, $color, $display, $storage, $camera, $CPU, $battery, $image_path) {
    //     $conn = connectDB();
    //     $sql = "INSERT INTO product (brand_id, name_product, selling_price, import_price, $color, display, storage, camera, CPU, battery, image) 
    //             VALUES (:brand_id, :name_product, :selling_price, :import_price, :color, :display, :storage, :camera, :CPU, :battery, :image)";
    //     $stmt = $conn->prepare($sql);

    //     $stmt->bindParam(':brand_id', $brand_id);
    //     $stmt->bindParam(':name_product', $name_product);
    //     $stmt->bindParam(':selling_price', $selling_price);
    //     $stmt->bindParam(':import_price', $import_price);
    //     $stmt->bindParam(':color', $color);
    //     $stmt->bindParam(':display', $display);
    //     $stmt->bindParam(':storage', $storage);
    //     $stmt->bindParam(':camera', $camera);
    //     $stmt->bindParam(':CPU', $CPU);
    //     $stmt->bindParam(':battery', $battery);
    //     $stmt->bindParam(':image', $image_path);
        
    //     $stmt->execute();
    // }
    function insertProduct($brand_id, $name_product, $selling_price, $import_price, $color, $display, $storage, $camera, $CPU, $battery, $image_path) {
        $conn = connectDB();
        $sql = "INSERT INTO product (brand_id, name_product, selling_price, import_price, color, display, storage, camera, CPU, battery, image) 
                VALUES (:brand_id, :name_product, :selling_price, :import_price, :color, :display, :storage, :camera, :CPU, :battery, :image)";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':selling_price', $selling_price);
        $stmt->bindParam(':import_price', $import_price);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':display', $display);
        $stmt->bindParam(':storage', $storage);
        $stmt->bindParam(':camera', $camera);
        $stmt->bindParam(':CPU', $CPU);
        $stmt->bindParam(':battery', $battery);
        $stmt->bindParam(':image', $image_path);
        
        $stmt->execute();
    }
    
    
?>