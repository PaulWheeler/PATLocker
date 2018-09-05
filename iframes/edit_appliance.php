<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
	<!-- Insert code here -->
  <form action="../client_toolreg.php" method="post" base target="_parent">
      <!--<input type="hidden" name="PAT_ID_search" value = <?php echo ($row['tool_id']);?> />-->
      <input type="submit" value="Appliance Register" class="MenuButton" style="width:50%" />
  </form>
  <form action="../find_pat.php" method="post" base target="_parent">
      <!--<input type="hidden" name="PAT_ID_search" value = <?php echo ($row['tool_id']);?> />-->
      <input type="submit" value="Find PAT Record" class="MenuButton" style="width:50%" />
  </form>
  <br><br>
  <?php
    if ($_SESSION['isloggedin'] == 'true' or $_SESSION['clientIsloggedin']=='true')
    {
      if($_SESSION['isloggedin'] == 'true')
      {
        require($_SESSION['includes'].'PAT_tester.php');
      }
      elseif($_SESSION['clientIsloggedin'] == 'true')
      {
        require($_SESSION['includes'].'PAT_client.php');
      }

      $mysql = ("
              SELECT *
              FROM patlocker.tool_register
              WHERE client_id = ". $_SESSION['client_id']."
              AND tool_id = ". $_POST['tool_id']);
      if($result = mysqli_query($conn, $mysql))
      {
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0)
        {

          $item_details_row = mysqli_fetch_array($result);
          $mysql =("
                  SELECT business_name, telephone
                  FROM loginDB.pat_testers
                  WHERE user_id=".$item_details_row['pat_tester_id']);
          $tester_result = mysqli_query($conn,$mysql);
          $pat_tester_row = mysqli_fetch_array($tester_result);



          $_SESSION['tool_key'] = $item_details_row['id_number'];
          $date_added = date('l jS F Y \a\t g:ia', strtotime($item_details_row['date_added']) );
          echo('<table>');
          echo('<form action="../plugin/update_appliance_reg.php" target="right_iframe" method="post">');
          echo('  <tr>');
          echo('    <td class="right"><b>Appliance ID Number</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['tool_id'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Description</b></td>');
          echo('    <td class="right"><p><textarea>'.$item_details_row['description'].'</textarea></p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Location</b></td>');
          echo('    <td class="right"><p><input name="location" type="text" value="'.$item_details_row['location'].'"></input></p></td>');
          echo('  </tr>');

          echo('  <input type="hidden" name="tool_id_number" value="'.$item_details_row['id_number'].'"></input>');
          //Start of Environment selector
          echo('  <tr>');
          echo('    <td class="right"><b>Environment</b></td>');
          echo('    <td class="right"><p>');
          echo('     <select title="What environment is the appliance used in" name="environment" required>');
          if($item_details_row['environment'] == 1)
          {
            echo('      <option value="1" selected="selected">1: Office</option>');
          }
          else
          {
            echo('      <option value="1">1: Office</option>');
          }

          if($item_details_row['environment'] == 2)
          {
            echo('      <option value="2" selected="selected">2: School</option>');
          }
          else
          {
            echo('      <option value="2">2: School</option>');
          }

          if($item_details_row['environment'] == 3)
          {
            echo('      <option value="3" selected="selected">3: Public and commercial</option>');
          }
          else
          {
            echo('      <option value="3">3: Public and commercial</option>');
          }

          if($item_details_row['environment'] == 4)
          {
            echo('      <option value="4" selected="selected">4: Industrial</option>');
          }
          else
          {
            echo('      <option value="4">4: Industrial</option>');
          }

          if($item_details_row['environment'] == 5)
          {
            echo('      <option value="5" selected="selected">5: Construction Sites</option>');
          }
          else
          {
            echo('      <option value="5">5: Construction Sites</option>');
          }
          echo'     </select>';
          echo'     </p></td>';
          echo('  </tr>');
          //End of Environment selector

          //Start of Tool Type selector
          echo('  <tr>');
          echo('    <td class="right"><b>Tool Type</b></td>');
          echo('    <td class="right"><p>');
          echo('      <select title="Select the type of appliance that is being tested"
                        name="tool_type" value="'.$item_details_row['tool_type'].'" required>');
          if($item_details_row['tool_type'] == 1)
          {
            echo('      <option title="Appliances heavier than 18kg without a carrying hande"
                          value="1" selectes="selected">1: Stationary</option>');
          }
          else
          {
            echo('      <option title="Appliances heavier than 18kg without a carrying hande"
                          value="1">1: Stationary</option>');
          }
          if($item_details_row['tool_type'] == 2)
          {
            echo('      <option title="Includes computers, fax machines, photocopiers and most business equipment"
                          value="2" selected="selected">2: IT</option>');
          }
          else
          {
            echo('      <option title="Includes computers, fax machines, photocopiers and most business equipment"
                          value="2">2: IT</option>');
          }

          if($item_details_row['tool_type'] == 3)
          {
            echo('      <option title="Less than 18kg or provided with casters or other means to facilitate movement"
                          value="3" selected="selected">3: Movable</option>');
          }
          else
          {
            echo('      <option title="Less than 18kg or provided with casters or other means to facilitate movement"
                          value="3">3: Movable</option>');
          }

          if($item_details_row['tool_type'] == 4)
          {
            echo('      <option title="Less than 18kg and can easily be moved from one location to another"
                          value="4" selected="selected">4: Portable</option>');
          }
          else
          {
            echo('      <option title="Less than 18kg and can easily be moved from one location to another"
                          value="4">4: Portable</option>');
          }

          if($item_details_row['tool_type'] == 5)
          {
            echo('      <option title="Equipment intended to be held whilst in operation"
                          value="5" selected="selected">5: Handheld</option>');
          }
          else
          {
            echo('      <option title="Equipment intended to be held whilst in operation"
                          value="5">5: Handheld</option>');
          }

          ?>
          </select>
          </p></td>
          <?php
          echo('  </tr>');
          //End of Tool Type Selector

          //Start of elecrical class selector
          echo('  <tr>');
          echo('    <td class="right"><b>Electrical Class</b></td>');
          echo('    <td class="right"><p> <select name="class" value="'.$item_details_row['class'].'">');

                      if($item_details_row['class']== 1)
                      {
                        echo'<option selected="selected" value="1">Class I</option>';
                      }
                      else
                      {
                        echo'<option value="1">Class I</option>';
                      }

                      if($item_details_row['class']== 2)
                      {
                        echo'<option selected="selected" value="2">Class II</option>';
                      }
                      else
                      {
                        echo'<option value="2">Class II</option>';
                      }

                      if($item_details_row['class']== 3)
                      {
                        echo'<option selected="selected" value="3">Class III</option>';
                      }
                      else
                      {
                        echo'<option value="3">Class II</option>';
                      }
                      if($item_details_row['class']== 4)
                      {
                        echo'<option selected="selected" value="4">IEC Lead / Extension cable</option>';
                      }
                      else
                      {
                        echo'<option value="4">IEC Lead / Extension cable</option>';
                      }
          echo'      </select>';
          echo'     </td>';
          echo'   </tr>';
          // End of electrical class

          //Start of fuse option
          echo('  <tr>');
          echo('    <td class="right"><b>Fuse size</b></td>');
          echo('    <td class="right"><p>');
          echo('      <select name="fuse_size" required >');
          if($item_details_row['fuse_size']== "na")
          {
            echo'<option value="na" selected="selected">N/A</option>';
          }
          else
          {
            echo'<option value="na">N/A</option>';
          }
          if($item_details_row['fuse_size']== "1")
          {
            echo'<option value="1" selected="selected">1 Amp</option>';
          }
          else
          {
            echo'<option value="1">1 Amp</option>';
          }
          if($item_details_row['fuse_size']== "2")
          {
            echo'<option value="2" selected="selected">2 Amps</option>';
          }
          else
          {
            echo'<option value="2">2 Amps</option>';
          }
          if($item_details_row['fuse_size']== "3")
          {
            echo'<option value="3" selected="selected">3 Amps</option>';
          }
          else
          {
            echo'<option value="3">3 Amps</option>';
          }
          if($item_details_row['fuse_size']== "4")
          {
            echo'<option value="4" selected="selected">4 Amps</option>';
          }
          else
          {
            echo'<option value="4">4 Amps</option>';
          }
          if($item_details_row['fuse_size']== "5")
          {
            echo'<option value="5" selected="selected">5 Amps</option>';
          }
          else
          {
            echo'<option value="5">5 Amps</option>';
          }
          if($item_details_row['fuse_size']== "6")
          {
            echo'<option value="6" selected="selected">6 Amps</option>';
          }
          else
          {
            echo'<option value="6">6 Amps</option>';
          }
          if($item_details_row['fuse_size']== "7")
          {
            echo'<option value="7" selected="selected">7 Amps</option>';
          }
          else
          {
            echo'<option value="7">7 Amps</option>';
          }
          if($item_details_row['fuse_size']== "8")
          {
            echo'<option value="8" selected="selected">8 Amps</option>';
          }
          else
          {
            echo'<option value="8">8 Amps</option>';
          }
          if($item_details_row['fuse_size']== "9")
          {
            echo'<option value="9" selected="selected">9 Amps</option>';
          }
          else
          {
            echo'<option value="9">9 Amps</option>';
          }
          if($item_details_row['fuse_size']== "10")
          {
            echo'<option value="10" selected="selected">10 Amps</option>';
          }
          else
          {
            echo'<option value="10">10 Amps</option>';
          }
          if($item_details_row['fuse_size']== "11")
          {
            echo'<option value="11" selected="selected">11 Amps</option>';
          }
          else
          {
            echo'<option value="11">11 Amps</option>';
          }
          if($item_details_row['fuse_size']== "12")
          {
            echo'<option value="12" selected="selected">12 Amps</option>';
          }
          else
          {
            echo'<option value="12">12 Amps</option>';
          }
          if($item_details_row['fuse_size']== "13")
          {
            echo'<option value="13" selected="selected">13 Amps</option>';
          }
          else
          {
            echo'<option value="13">13 Amps</option>';
          }
          if($item_details_row['fuse_size']== "15")
          {
            echo'<option value="15" selected="selected">15 Amps</option>';
          }
          else
          {
            echo'<option value="15">15 Amps</option>';
          }
          if($item_details_row['fuse_size']== "20")
          {
            echo'<option value="20" selected="selected">20 Amps</option>';
          }
          else
          {
            echo'<option value="20">20 Amps</option>';
          }
          if($item_details_row['fuse_size']== "30")
          {
            echo'<option value="30" selected="selected">30 Amps</option>';
          }
          else
          {
            echo'<option value="30">30 Amps</option>';
          }
          if($item_details_row['fuse_size']== "45")
          {
            echo'<option value="45" selected="selected">45 Amps</option>';
          }
          else
          {
            echo'<option value="45">45 Amps</option>';
          }
          echo'    </select>';
          echo'   </td>';
          echo'   </tr>';
          //end of fuse option

          //Start of combined inspection frequency
          echo('  <tr>');
          echo('    <td class="right"><b>Inspection Frequency</b></td>');
          echo('    <td class="right"><p>');
          echo('      <select name="combined_inspection_frequency" required >');
          if($item_details_row['combined_inspection_frequency']== "3")
          {
            echo'<option value="3" selected="selected">3 Months</option>';
          }
          else
          {
            echo'<option value="3">3 Months</option>';
          }
          if($item_details_row['combined_inspection_frequency']== "6")
          {
            echo'<option value="6" selected="selected">6 Months</option>';
          }
          else
          {
            echo'<option value="6">6 Months</option>';
          }
          if($item_details_row['combined_inspection_frequency']== "12")
          {
            echo'<option value="12" selected="selected">1 Year</option>';
          }
          else
          {
            echo'<option value="12">1 Year</option>';
          }

          if($item_details_row['combined_inspection_frequency']== "18")
          {
            echo'<option value="18" selected="selected">18 Months</option>';
          }
          else
          {
            echo'<option value="18">18 Months</option>';
          }
          if($item_details_row['combined_inspection_frequency']== "24")
          {
            echo'<option value="24" selected="selected">2 Years</option>';
          }
          else
          {
            echo'<option value="24">2 Years</option>';
          }
          if($item_details_row['combined_inspection_frequency']== "36")
          {
            echo'<option value="36" selected="selected">3 Years</option>';
          }
          else
          {
            echo'<option value="36">3 Years</option>';
          }
          if($item_details_row['combined_inspection_frequency']== "48")
          {
            echo'<option value="48" selected="selected">4 Years</option>';
          }
          else
          {
            echo'<option value="48">4 Years</option>';
          }
          echo('  </tr>');
          echo( '<tr>');
          //End of inspection frequency

          //Start of relevent info
          echo('  <tr>');
          echo('    <td class="right"><b>Information</b></td>');
          echo('    <td class="right"><p><textarea name="relevent_info">'.$item_details_row['relevent_info'].'</textarea></p></td>');
          echo('  </tr>');
          //End of relevent info


          echo('  <tr>');
          echo('    <td class="right"><b>PAT Tester Business name</b></td>');
          echo('    <td class="right"><p>'.$pat_tester_row['business_name'].'</p></td>');
          echo('  </tr>');
          // echo('  <tr>');
          // echo('    <td class="right"><b>PAT Tester Telephone</b></td>');
          // echo('    <td class="right"><p>'.$pat_tester_row['telephone'].'</p></td>');
          // echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Date added to register</b></td>');
          echo('    <td class="right"><p>'.$date_added.'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <input type="hidden" name="id_number" value = "'.$item_details_row['id_number'].'"></input>');

          echo('  </tr>');
          echo('</table>');
          echo('    <td class="right"><p><input type="submit" value="Update Appliance" class="MenuButton" style="width:100%" /></td>');

          echo('</form>');

          $_SESSION['combined_inspection_frequency'] = $item_details_row['combined_inspection_frequency'];
        ?>
          <!-- <form action="../add_pat.php" method="post" base target="_parent">
              <input type="hidden" name="tool_id" value = <?php echo ($item_details_row['tool_id']);?> />
              <input type="submit" value="Add PAT Record" class="MenuButton" style="width:100%" />
          </form> -->
          <br><br><?php
        }
        else
        {
          $_SESSION['tool_key'] = $item_details_row['id_number'];
          echo('<p>Sorry, item not found in register</p>');
        }
  }
  else
  {
    echo('<p>Sorry. I can\'t find an appliance in the register with that id. Please try again. </p>');
  }
}
    ?>

</body>
</html>
