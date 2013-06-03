Loại sản phẩm: <select class="Select" name="Type">
                                    <?php 
                                        $i=0;
                                        foreach($rowsType as $rowType){ 
                                            echo "<option value='{$rowType['TypeID']}'>{$rowType['TypeName']}</option>";        
                                        }
                                    
                                    
    ?>
</select>