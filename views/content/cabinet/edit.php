<?php $titlePage = 'Кабинет';  include ROOT . '/views/content/layout/header.php'; $n = 19; ?>
<?php  include ROOT . '/views/content/layout/nav.php'; ?>
<div class="container">
  <div class="wrepper content">
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
	    	
	        <?php if(isset($errors) && is_array($errors)):?>
		        <ul>
		          <?php foreach ($errors as $error): ?>
		          <li>- <?php echo $error; ?></li>
		          <?php endforeach; ?>
		        </ul>
	        <?php endif; ?>
	        <h3><?php echo EDIT_ACCOUNT; ?></h3>
	        <?php if($result):?>
					<h4 class="alert alert-success"><?php echo EDIT_SUCCEESS; ?></h4>
	    	<?php endif; ?>
	    	<form action="#" method="post">
	    	<div class="row">
	    		<div class="col-xs-12 col-sm-6 col-md-6">
	    			<h3><?php echo USER_DATA; ?></h3>
	    			<div class="form-group">
		              <label for="name"><?php echo  NAME; ?></label>
		              <input name="name" type="name" class="form-control" id="name" value="<?php echo $user['name']; ?>">
		            </div>
		             <div class="form-group">
		              <label for="email"><?php echo  PHONE .'*'; ?></label>
		              <input name="phone" type="text" class="form-control bfh-phone" id="phone" data-format="+998 (dd) ddd-dd-dd" value="<?php echo $user['phone']; ?>">
	            	</div>
		            <div class="form-group">
		              <label for="password"><?php echo  PASSWORD; ?></label>
		              <input  name="password" type="password" class="form-control" id="password" value="<?php echo  $user['password']; ?>">
		            </div>
	    		</div>
	    		<div class="col-xs-12 col-sm-6 col-md-6">
	    			<h3><?php echo USER_ADDRESS; ?></h3>
	    			<div class="form-group">
		              <label for="street"><?php echo  ADDRESS_STREET; ?></label>
		              <input  name="street" type="text" class="form-control" id="street" value="<?php echo  $address['street']; ?>">
		            </div>
		            <div class="form-group">
		              <label for="building"><?php echo  ADDRESS_BUILDING; ?></label>
		              <input  name="building" type="text" class="form-control" id="building" value="<?php echo  $address['building']; ?>">
		            </div>
		            <div class="form-group">
		              <label for="appt"><?php echo  ADDRESS_APPT; ?></label>
		              <input  name="appt" type="text" class="form-control" id="appt" value="<?php echo  $address['appt']; ?>">
		            </div>
		            <div class="form-group">
		              <label for="entrance"><?php echo  ADDRESS_ENTRANCE; ?></label>
		              <input  name="entrance" type="text" class="form-control" id="entrance" value="<?php echo  $address['entrance']; ?>">
		            </div>
		            <div class="form-group">
		              <label for="intercom"><?php echo  ADDRESS_INTERCOM; ?></label>
		              <input  name="intercom" type="text" class="form-control" id="intercom" value="<?php echo  $address['intercom']; ?>">
		            </div>
		            <div class="form-group">
		              <label for="people"><?php echo  ADDRESS_PEOPLE; ?></label>
		              <input  name="people" type="text" class="form-control" id="people" value="<?php echo  $address['people']; ?>">
		            </div>
		            <div class="form-group">
		              <label for="landmark"><?php echo  ADDRESS_LANDMARK; ?></label>
		              <input  name="landmark" type="text" class="form-control" id="landmark" value="<?php echo  $address['landmark']; ?>">
		            </div>
		    	</div>
	    	</div>
	                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block"><?php echo  SAVE; ?></button>
            </form>
    	</div>
    </div>
<?php  include ROOT . '/views/content/layout/footer.php'; ?>
