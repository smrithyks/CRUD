<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policy List</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Policy List</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Policyholder Name</th>
                <th>Policy Number</th>
                <th>Premium</th>
                <th>Commission</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($policylist as $policy){ ?>
                <tr>
                    <td><?php echo $policy['ph_name']; ?></td>
                    <td><?php echo $policy['policy_no']; ?></td>
                    <td><?php echo $policy['premium']; ?></td>
                    <td><?php echo $policy['commission']; ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editPolicyModal" data-id="<?php echo $policy['id']; ?>" data-ph_name="<?php echo $policy['ph_name']; ?>" data-short_name="<?php echo $policy['short_name']; ?>" data-policy_no="<?php echo $policy['policy_no']; ?>" data-pin_tm="<?php echo $policy['pin_tm']; ?>" data-due_date="<?php echo $policy['due_date']; ?>" data-risk_date="<?php echo $policy['risk_date']; ?>" data-cbo="<?php echo $policy['cbo']; ?>" data-adj_date="<?php echo $policy['adj_date']; ?>" data-premium="<?php echo $policy['premium']; ?>" data-commission="<?php echo $policy['commission']; ?>">Edit</button>
                        <a href="<?php echo site_url('dashboard/delete_policy/' . $policy['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this policy?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<div class="modal fade" id="editPolicyModal" tabindex="-1" aria-labelledby="editPolicyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPolicyModalLabel">Edit Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPolicyForm" action="<?php echo site_url('dashboard/update_policy'); ?>" method="post">
                    
                    <input type="hidden" id="policy_id" name="policy_id">

                    <div class="mb-3">
                        <label for="ph_name" class="form-label">Policyholder Name</label>
                        <input type="text" class="form-control" id="ph_name" name="ph_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="short_name" class="form-label">Short Name</label>
                        <input type="text" class="form-control" id="short_name" name="short_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="policy_no" class="form-label">Policy Number</label>
                        <input type="text" class="form-control" id="policy_no" name="policy_no" required>
                    </div>

                    <div class="mb-3">
                        <label for="pin_tm" class="form-label">PIN/TM</label>
                        <input type="text" class="form-control" id="pin_tm" name="pin_tm" required>
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="risk_date" class="form-label">Risk Date</label>
                        <input type="date" class="form-control" id="risk_date" name="risk_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="cbo" class="form-label">CBO</label>
                        <input type="text" class="form-control" id="cbo" name="cbo" required>
                    </div>

                    <div class="mb-3">
                        <label for="adj_date" class="form-label">Adjust Date</label>
                        <input type="date" class="form-control" id="adj_date" name="adj_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="premium" class="form-label">Premium Amount</label>
                        <input type="number" class="form-control" id="premium" name="premium" required step="0.01">
                    </div>

                    <div class="mb-3">
                        <label for="commission" class="form-label">Commission</label>
                        <input type="number" class="form-control" id="commission" name="commission" required step="0.01">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Policy</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            const policyId = $(this).data('id');
            const phName = $(this).data('ph_name');
            const shortName = $(this).data('short_name');
            const policyNo = $(this).data('policy_no');
            const pinTm = $(this).data('pin_tm');
            const dueDate = $(this).data('due_date');
            const riskDate = $(this).data('risk_date');
            const cbo = $(this).data('cbo');
            const adjDate = $(this).data('adj_date');
            const premium = $(this).data('premium');
            const commission = $(this).data('commission');

            $('#policy_id').val(policyId);
            $('#ph_name').val(phName);
            $('#short_name').val(shortName);
            $('#policy_no').val(policyNo);
            $('#pin_tm').val(pinTm);
            $('#due_date').val(dueDate);
            $('#risk_date').val(riskDate);
            $('#cbo').val(cbo);
            $('#adj_date').val(adjDate);
            $('#premium').val(premium);
            $('#commission').val(commission);
        });
    });
</script>

</body>
</html>
