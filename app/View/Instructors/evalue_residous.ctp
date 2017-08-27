<input type="hidden" value="<?php echo (isset($evalue['Evaluate']['id']))?$evalue['Evaluate']['id']:'';?>" name="data[Residous][id]" />

<input type="hidden" value="<?php echo $pdca_id;?>" name="data[Residous][pdca_id]" />
<input type="hidden" value="<?php echo round($avgCostDayBefore,2); ?>" name="data[Residous][round_avg_day_before]" id="round_avg_day_before_4"/>
<input type="hidden" value="<?php echo round($avgCostDayAfter,2); ?>" name="data[Residous][round_avg_day_after]" id="round_avg_day_after_4"/>
<input type="hidden" value="<?php echo round($avgAFaminlyDay,2); ?>" name="data[Residous][round_avg_day_family]" id="round_avg_day_family_4"/>
<input type="hidden" value="<?php echo $avgCostDayBefore; ?>" name="data[Residous][avg_day_before]" id="avg_day_before_4"/>
<input type="hidden" value="<?php echo $avgCostDayAfter; ?>" name="data[Residous][avg_day_after]" id="avg_day_after_4"/>
<input type="hidden" value="<?php echo $avgAFaminlyDay; ?>" name="data[Residous][avg_day_family]" id="avg_day_family_4"/>

<div class="tab-left" >
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th><?php echo __('Estrategia'); ?></th>
                <th><?php echo __('entes'); ?></th>
                <th><?php echo __('durante'); ?></th>
            </tr>
        <tr>
             <td><?php echo __('Consumo total registrado'); ?></td>
            <td>
                <?php echo $totalMeasurementBefore ;?>
            </td>
          
             <td>
                 <?php echo $totalMeasurementAfter ;?>
             </td>
        </tr>
        <tr>
             <td><?php echo __('N° de días registrados'); ?></td>
            <td>
                <?php echo $numberMeasurement ;?>
            </td>
          
             <td>
                 <?php echo $numberMeasurement ;?>
             </td>
        </tr>
        <tr>
             <td><?php echo __('Consumo promedio por día'); ?></td>
            <td>
                <?php echo round($avgCostDayBefore,2); ?>
            </td>
          
             <td>
                <?php echo round($avgCostDayAfter,2); ?>
             </td>
        </tr>
        <tr>
             <td><?php echo __('Consumo promedio por día por persona'); ?></td>
            <td>
                <?php echo round($avgCostDayPersonBefore,2);?>
            </td>
             <td>
                <?php echo round($avgCostDayPersonAfter,2);?> 
             </td>
        </tr>
        <tr>
             <td><?php echo __('Variación del consumo del hogar por día'); ?></td>
            <td colspan="2">
               <?php echo round($avgAFaminlyDay,2);?> 
             </td>
        </tr>
        
    </tbody>
    </table>

     <table class="table table-bordered" style="width: 100%;margin-top: 10px;">
        <tbody>
            <tr>
                <th><?php echo __('Point');?></th>
                <th style="width: 30px"><?php echo __('R');?></th>
                <th style="width: 30px"><?php echo __('B');?></th>
                <th style="width: 30px"><?php echo __('MB');?></th>
            </tr>
        <tr>
             <td><?php echo __('Reconocimiento de la situación (antes de la estrategia)'); ?></td>
            <td>
                <input type="radio" name="data[Residous][recognite_before]" style="opacity: 1;" value="1" <?php echo (isset($evalue['Evaluate']['evaluate_situation_before']) && $evalue['Evaluate']['evaluate_situation_before']==1 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
            </td>
          
             <td>
             &nbsp;
              </td>
             <td>
                <input type="radio" name="data[Residous][recognite_before]" style="opacity: 1;" value="3" <?php echo (isset($evalue['Evaluate']['evaluate_situation_before']) && $evalue['Evaluate']['evaluate_situation_before']==3 )?'checked="checked"':''?> onclick="return changePointResidous()" />
             </td>
        </tr>
        <tr>
             <td><?php echo __('Planificación de estrategias'); ?></td>
            <td>
                <input type="radio" name="data[Residous][plan]" style="opacity: 1;" value="1" <?php echo (isset($evalue['Evaluate']['evaluate_plan']) && $evalue['Evaluate']['evaluate_plan']==1 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
            </td>
          
             <td>
                <input type="radio" name="data[Residous][plan]" style="opacity: 1;" value="2"  <?php echo (isset($evalue['Evaluate']['evaluate_plan']) && $evalue['Evaluate']['evaluate_plan']==2 )?'checked="checked"':''?>onclick="return changePointResidous()" />
             </td>
             <td>
                <input type="radio" name="data[Residous][plan]" style="opacity: 1;" value="3"  <?php echo (isset($evalue['Evaluate']['evaluate_plan']) && $evalue['Evaluate']['evaluate_plan']==3 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
             </td>
        </tr>
        <tr>
             <td><?php echo __('Reconocimiento de la situación (después de la estrategia)'); ?></td>
            <td>
                <input type="radio" name="data[Residous][recognite_after]" style="opacity: 1;" value="1" <?php echo (isset($evalue['Evaluate']['evaluate_situation_after']) && $evalue['Evaluate']['evaluate_situation_after']==1 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
            </td>
          
             <td>
                &nbsp;
             </td>
             <td>
                <input type="radio" name="data[Residous][recognite_after]" style="opacity: 1;" value="3" <?php echo (isset($evalue['Evaluate']['evaluate_situation_after']) && $evalue['Evaluate']['evaluate_situation_after']==3 )?'checked="checked"':''?>  onclick="return changePointResidous()"/>
             </td>
        </tr>
        <tr>
             <td><?php echo __('Comparación resultados de la estrategia (análisis de datos)'); ?></td>
            <td>
                <input type="radio" name="data[Residous][compare_result]" style="opacity: 1;" value="1" <?php echo (isset($evalue['Evaluate']['evaluate_compare_result']) && $evalue['Evaluate']['evaluate_compare_result']==1 )?'checked="checked"':''?>  onclick="return changePointResidous()"/>
            </td>
          
             <td>
                <input type="radio" name="data[Residous][compare_result]" style="opacity: 1;" value="2"  <?php echo (isset($evalue['Evaluate']['evaluate_compare_result']) && $evalue['Evaluate']['evaluate_compare_result']==2 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
             </td>
             <td>
                <input type="radio" name="data[Residous][compare_result]" style="opacity: 1;" value="3" <?php echo (isset($evalue['Evaluate']['evaluate_compare_result']) && $evalue['Evaluate']['evaluate_compare_result']==3 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
             </td>
        </tr>
        <tr>
             <td><?php echo __('Resultados de la implementación de la estrategia'); ?></td>
            <td>
                <input type="radio" name="data[Residous][result]" style="opacity: 1;" value="1"  <?php echo (isset($evalue['Evaluate']['evaluate_compare_result']) && $evalue['Evaluate']['evaluate_result']==1 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
            </td>
             <td>
                &nbsp;
             </td>
             <td>
                <input type="radio" name="data[Residous][result]" style="opacity: 1;" value="3" <?php echo (isset($evalue['Evaluate']['evaluate_compare_result']) && $evalue['Evaluate']['evaluate_result']==3 )?'checked="checked"':''?> onclick="return changePointResidous()"/>
             </td>
        </tr>
        
        
    </tbody>
    </table>
    <br />
    <label>
    Hay medidor accesible&nbsp; &nbsp;&nbsp;&nbsp;      

                Si
                       <input type="radio" name="data[Residous][accessible]" style="opacity: 1;" value="1" <?php echo (isset($evalue['Evaluate']['meter_accessability']) && $evalue['Evaluate']['meter_accessability']==1 )?'checked="checked"':''?> onclick="return loadFraseData(4)"/>
    </label>
    &nbsp;&nbsp; 
     <label>
                No  <input type="radio" name="data[Residous][accessible]" style="opacity: 1;" value="0" <?php echo (isset($evalue['Evaluate']['meter_accessability']) && $evalue['Evaluate']['meter_accessability']==0 )?'checked="checked"':''?> onclick="return loadFraseData(4)"/>
    </label> 
    <br />
    <label>
    Toma de datos&nbsp; &nbsp;&nbsp;&nbsp;      

                Si
                       <input type="radio" name="data[Residous][data_collect]" style="opacity: 1;" value="1" <?php echo (isset($evalue['Evaluate']['is_data_recorded']) && $evalue['Evaluate']['is_data_recorded']==1 )?'checked="checked"':''?> onclick="return loadFraseData(4)"/>
    </label>
    &nbsp;&nbsp; 
     <label>
                No  <input type="radio" name="data[Residous][data_collect]" style="opacity: 1;" value="0" <?php echo (isset($evalue['Evaluate']['is_data_recorded']) && $evalue['Evaluate']['is_data_recorded']==0 )?'checked="checked"':''?> onclick="return loadFraseData(4)"/>
    </label>  
    <br />
    <div class="form-group col-lg-10  " style="padding: 0px;margin:0px">
      <label for="lastname" class="control-label col-lg-6" style="text-align: left;padding-top:8px;padding-left: 0px;"><?php echo _('Registro de datos ') ?></label>
      <div class="col-lg-6" style="padding: 0px;">
          <select class="form-control" name="data[Residous][data_record_mode]" id="data_record_mode_4" onchange="removeError(this.id)">
            <option value="0"><?php echo __('Select');?></option>
            <?php foreach (FunctionCommon::$registroDeDatos as $k=>$v){ 
                $select= (isset($evalue['Evaluate']['data_record_mode']) && $evalue['Evaluate']['data_record_mode']==$k )?'selected="selected"':'';
                echo "<option value='$k' $select >$v</option>";
            }    
            ?>
         </select>
      </div>
    </div> 
    <br /><br />
    <div class="form-group col-lg-10  " style="padding: 0px;margin:0px">
      <label for="lastname" class="control-label col-lg-6" style="text-align: left;padding-top:8px;padding-left: 0px;"><?php echo _('Procesamiento de datos ') ?></label>
      <div class="col-lg-6" style="padding: 0px;">
         <select class="form-control" name="data[Residous][data_analysis_mode]" id="data_analysis_mode_4" onchange="removeError(this.id)">
            <option value="0"><?php echo __('Select');?></option>
            <?php foreach (FunctionCommon::$procesamientoDeDatos as $k=>$v){ 
                 $select= (isset($evalue['Evaluate']['data_analysis_mode']) && $evalue['Evaluate']['data_analysis_mode']==$k )?'selected="selected"':'';
               
                echo "<option value='$k' $select>$v</option>";
            }    
            ?>
         </select>
          <span class="help-inline " id="error_type_name" style="color:red"></span>
      </div>
    </div> 
    <br /><br />
    <div class="form-group col-lg-10  " style="padding: 0px;margin:0px">
      <label for="lastname" class="control-label col-lg-6" style="text-align: left;padding-top:8px;padding-left: 0px;"><?php echo _('Datos No Fehacientes ') ?></label>
      <div class="col-lg-6" style="padding: 0px;">
          <select class="form-control" name="data[Residous][is_data_reliable]">
            <option value="0" <?php echo (isset($evalue['Evaluate']['is_data_reliable']) && $evalue['Evaluate']['is_data_reliable']==0 )?'selected="selected"':''; ?>></option>
            <option value="1" <?php echo (isset($evalue['Evaluate']['is_data_reliable']) && $evalue['Evaluate']['is_data_reliable']==1 )?'selected="selected"':''; ?>>Datos No Fehacientes</option>
          
       </select>
          <span class="help-inline " id="error_type_name" style="color:red"></span>
      </div>
    </div>  
    <br /><br />
    <div class="form-group col-lg-10  " style="padding: 0px;margin:0px">
      <label for="lastname" class="control-label col-lg-10" style="padding-top:8px;padding-left: 0px;"><?php echo _('Sensibilización sobre la cuestión ambiental  ') ?></label>
      <div class="col-lg-10" style="padding: 0px;height:100px;">
          <textarea rows="4" cols="32" name="data[Residous][comment]" id="environment_4" onkeyup="loadContador(4)"><?php echo (isset($evalue['Evaluate']['comment']))?$evalue['Evaluate']['comment']:''; ?></textarea>
          <span class="help-inline " id="error_type_name" style="color:red"></span>
      </div>
    </div>  
    <br /><br />    
</div>
<div class="tab-right">
<p class="p-title">Evaluación de habilidad de gestión</p>
<p class="p-content" id="evalue_manage_residous">

</p>
<p class="p-title" >Frase Data</p>
<p class="p-content" id="frase_data_4">
  
</p>
<div class="form-group col-lg-10  " style="padding: 0px">
      <label for="lastname" class="control-label col-lg-3" style="text-align: left;padding-top:8px;padding-left: 0px;"><?php echo _(' Contador') ?></label>
      <div class="col-lg-6" style="padding: 0px;">
          <input type="text" class="form-control" id="contador_4">
           
          <span class="help-inline " id="error_type_name" style="color:red"></span>
      </div>
    </div> 

</div>
