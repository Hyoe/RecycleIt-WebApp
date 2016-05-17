<?php while($row = $places->fetch_object()){ ?>
  <option value="<?php echo $row->place; ?>" data-id="<?php echo $row->place_id; ?>" data-lat="<?php echo $row->lat; ?>" data-lng="<?php echo $row->lng; ?>" data-place="<?php echo $row->place; ?>" data-description="<?php echo $row->description; ?>"><?php echo $row->place; ?></option>
<?php } ?>
</datalist>