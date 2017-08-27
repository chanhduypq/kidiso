   
   <div style="width: 100%;" >
                <?php
                if(!empty($analysic) || !empty($mesurement)){
                 if(!empty($analysic)){
                      $totalBefore =0;
                      $totalAfter = 0;      
                ?>
                <p style="font-weight: bold;"><?php echo __('Analysic method');?></p>
                
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th><?php echo __('Item'); ?></th>
                            <th><?php echo __('entes'); ?></th>
                            <th><?php echo __('durante'); ?></th>
                        </tr>
                        <?php foreach ($analysic as $k=>$v){
                        $totalBefore +=  $v['value_before'];
                        $totalAfter  +=  $v['value_after']; 
                        ?>
                    <tr>
                        <td><?php echo $v['item_name']; ?></td>
                        <td>
                            <?php echo $v['value_before']; ?>
                        </td>
                            
                        <td>
                             <?php echo $v['value_after']; ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td><?php echo __('total');?></td>
                        <td><?php echo $totalBefore;?></td>
                        <td><?php echo $totalAfter;?></td>
                    </tr>
                    
                </tbody>
                </table>
               <?php } ?>
               <div style="width: 100%;" >
                <?php if(!empty($mesurement)){
                      $totalBefore =0;
                      $totalAfter = 0;      
                ?>
                <p style="font-weight: bold;"><?php echo __('Mesurement method');?></p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th><?php echo __('Date before'); ?></th>
                            <th><?php echo __('Date after'); ?></th>
                            <th><?php echo __('entes'); ?></th>
                            <th><?php echo __('durante'); ?></th>
                        </tr>
                        <?php foreach ($mesurement as $k=>$v){
                        $totalBefore +=  $v['value_before'];
                        $totalAfter  +=  $v['value_after']; 
                        ?>
                    <tr>
                        <td><?php echo (!empty($v['date_before']))?(date('Y/m/d',strtotime($v['date_before']))):""; ?></td>
                        <td><?php echo (!empty($v['date_after']))?date('Y/m/d',strtotime($v['date_after'])):''; ?></td>
                        <td>
                            <?php echo $v['value_before']; ?>
                        </td>
                            
                        <td>
                             <?php echo $v['value_after']; ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2"><?php echo __('total');?></td>
                        <td><?php echo $totalBefore;?></td>
                        <td><?php echo $totalAfter;?></td>
                    </tr>
                    
                </tbody>
                </table>
               <?php } ?>
                
                
            </div>
            <?php } else{ 
                
               echo NO_PDCA_MESUREMENT; 
              }  ?>
       </div>     