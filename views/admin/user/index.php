<?php $titlePage = "Регистрация";  include ROOT . '/views/admin/layout/header.php'; ?>
<?php include ROOT . '/views/admin/layout/nav.php'; ?>
	<div class="content">
		<div class="row">
		    <div class="col s12 m4 l4">
		       <?php include ROOT. '/views/admin/layout/siteBar.php'; ?>
		    </div>
		    <div class="col s12 m8 l8">
		    <h5>Список пользователей сайта</h5>
		    <p>Общее количество пользователей: <b><?php echo $total ?></b></p>
		    <a href="/<?php echo $lang; ?>/user/register" class="btn-large">Добавить нового пользователя <i class="material-icons right">account_circle</i></a>
		    <table class="responsive-table highlight">
		    	<thead>
		    		<th>Имя</th>
		    		<th>Логин <i class="material-icons left">vpn_key</i></th>
		    		<th>Статус</th>
		    		<th>Ред.</th>
		    	</thead>
		    	<tbody>
		    	
		    		<?php foreach ($users as $user): ?>
		    			<tr>
			    			<td><?php echo $user['name'] ?></td>
			    			<td><?php echo $user['login'] ?></td>
			    			<td><?php echo $user['role'] ?></td>
			    			<td>
			    				<a href="/<?php echo $lang; ?>/admin/user/update/<?php echo $user['user_id'] ?>" class="orange btn-floating waves-effect waves-light"><i class="material-icons">edit</i></a>
								<a href="/<?php echo $lang; ?>/admin/user/delete/<?php echo $user['user_id'] ?>" class="red btn-floating waves-effect waves-light"><i class="material-icons">delete</i></a>
			    			</td>
		    			</tr>
		    		<?php endforeach ?>
		    		
		    		
		    	</tbody>
		    </table>
		    	<?php echo $pagination->get(); ?>
		    </div>
		</div>
	</div>

<?php  include ROOT . '/views/admin/layout/footer.php'; ?>