<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['history_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Πληροφορίες Παρραγελίας</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Χρήστης: <b><?php echo $row['idh_user']; ?></b>
                        <span class="pull-right">
                            <?php echo date('M d, Y h:i A', strtotime($row['s_date'])) ?>
                        </span>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Όνομα Προϊόντος</th>
                            <th>Τιμή</th>
                            <th>Ποσότητα</th>
                            <th>Άθροισμα</th>
                        </thead>
                        <tbody>
                            <?php	
                                $sql2="select * from history left join product on product.product_id =history.idh_prod where idh_prod=:idh_prod";
								$query2 = $con->prepare($sql2);
								$query2->execute(array(':idh_prod' => $hid));	
                                foreach($query2->fetchAll() as $row2) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row2['product_name']; ?></td>
                                        <td class="text-right"><?php echo $row2['value']; ?></td>
                                        <td><?php echo $row2['quantity']; ?></td>
                                        <td class="text-right">&#8369;
                                            <?php
                                                $subt = $row2['value']*$row2['quantity'];
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                            ?>
                            <tr>
                                <td colspan="3" class="text-right"><b>Σύνολο</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
