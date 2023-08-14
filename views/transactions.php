<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
            
            .positive {
                color: green;
            }

            .negative {
                color: red;
            }

        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($content as $transaction): ?>
                    <tr>
                        <td><?= date('M d, Y', strtotime($transaction['Date'])) ?></td>
                        <td><?= $transaction['Check #'] ?></td>
                        <td><?= $transaction['Description'] ?></td>

                        <!-- Dynamic add color based on the first char using ternary operator -->
                        <td class=" <?= ($transaction['Amount'][0] !== '-') ? "positive": "negative" ?>">
                            <?= $transaction['Amount'] ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td>
                        <?php echo $total_income; ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td>
                        <?= $total_expense; ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td>
                        <?= $net_total; ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
