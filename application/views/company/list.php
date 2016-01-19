<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<div id="body">
            <table>
                <tr>
                    <td>Name</td>
                    <td>District</td>
                    <td>Contact</td>
                    <td>Phone</td>
                    <td>Mobile</td>
                    <td>Action</td>
                </tr>
                <?php foreach($companies as $key => $company):?>
                <tr>
                    <td><?php echo $company->name;?></td>
                    <td><?php echo $company->district;?></td>
                    <td><?php echo $company->contact;?></td>
                    <td><?php echo $company->phone;?></td>
                    <td><?php echo $company->mobile;?></td>
                    <td>
                        <a href="/company/edit/<?php echo $company->id;?>">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <a href="/company/all">First</a>
            <?php if ($currentPage > 1):?>
            <a href="/company/all/<?php echo $currentPage - 1;?>">Previous</a>
            <?php endif;?>
            <?php if ($currentPage < ceil($counts / $pageNum)):?>
            <a href="/company/all/<?php echo $currentPage + 1;?>">Next</a>
            <?php endif;?>
            <a href="/company/all/<?php echo ceil($counts / $pageNum);?>">Last</a>
            <input id="goto" type="text" value="<?php $currentPage?>"/>
            <input type="button" onclick="window.location = '/company/all/' + $('#goto').val();" value="Go"/>
        </div>
</div>
