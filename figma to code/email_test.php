<?php
/**
 * Email Delivery Diagnostic - Upload to pandabooth.ro
 * Access via: https://pandabooth.ro/figma%20to%20code/email_test.php
 */

header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; font-size: 14px; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; }
        h1 { color: #333; }
        .section { margin: 20px 0; padding: 15px; background: #f9f9f9; border-left: 4px solid #2196F3; }
        .ok { color: #27ae60; font-weight: bold; }
        .error { color: #e74c3c; font-weight: bold; }
        .warning { color: #f39c12; font-weight: bold; }
        input { padding: 10px; margin: 5px 0; width: 100%; max-width: 400px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 20px; background: #2196F3; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        button:hover { background: #1976D2; }
        .result { margin-top: 20px; padding: 15px; background: #f0f0f0; border-radius: 4px; white-space: pre-wrap; font-family: monospace; font-size: 12px; }
        .success { background: #d4edda; }
        .failure { background: #f8d7da; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📧 Email Delivery Test</h1>
        <p>Upload this file to: <code>https://pandabooth.ro/figma to code/email_test.php</code></p>

        <div class="section">
            <h2>1. Server Configuration</h2>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>PHP Version:</strong></td>
                    <td><?php echo phpversion(); ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>Server OS:</strong></td>
                    <td><?php echo php_uname(); ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>sendmail_path:</strong></td>
                    <td><code><?php echo ini_get('sendmail_path'); ?></code></td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>mail.log:</strong></td>
                    <td><code><?php echo ini_get('mail.log') ?: '(not set)'; ?></code></td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>2. Send Test Email</h2>
            <p>Enter your real email address and send a test:</p>
            
            <form method="POST">
                <input type="email" name="test_email" placeholder="your@email.com" required>
                <button type="submit">Send Test Email</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['test_email'])) {
                $test_email = $_POST['test_email'];
                
                echo '<div class="result">';
                echo "Testing email to: <strong>$test_email</strong>\n\n";
                
                $subject = "Pandabooth Test - " . date('Y-m-d H:i:s');
                $body = "This is a test email from pandabooth.ro\n\nIf you received this, email delivery works!\nTime sent: " . date('Y-m-d H:i:s');
                
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
                $headers .= "From: test@pandabooth.ro\r\n";
                $headers .= "Return-Path: test@pandabooth.ro\r\n";
                
                echo "Subject: $subject\n";
                echo "Headers: " . str_replace("\r\n", " | ", $headers) . "\n\n";
                
                $result = @mail($test_email, $subject, $body, $headers, '-f test@pandabooth.ro');
                
                echo "========================================\n";
                echo "mail() function returned: " . ($result ? 'TRUE ✓' : 'FALSE ✗') . "\n";
                echo "========================================\n\n";
                
                if ($result) {
                    echo "<span class='ok'>✓ Email queued successfully</span>\n";
                    echo "Check your inbox/spam in 30 seconds.\n\n";
                    echo "If you don't receive it:\n";
                    echo "1. Email might be stuck in Exim queue\n";
                    echo "2. SPF/DKIM might be blocking it\n";
                    echo "3. Gmail/recipient filtering\n";
                } else {
                    echo "<span class='error'>✗ mail() returned FALSE</span>\n";
                    echo "Check sendmail configuration above.\n";
                }
                
                echo '</div>';
            }
            ?>
        </div>

        <div class="section">
            <h2>3. Check Mail Queue</h2>
            <p><strong>Emails stuck waiting to send?</strong></p>
            
            <?php
            $queue_output = shell_exec('mailq 2>&1 | head -5') ?: shell_exec('exim -bp 2>&1 | head -5') ?: 'Cannot access mail queue';
            
            if (strpos($queue_output, 'No mail') !== false || strpos($queue_output, 'empty') !== false) {
                echo "<span class='ok'>✓ Queue is empty - no stuck emails</span>\n";
            } else {
                echo "<span class='warning'>⚠️ Items in queue:</span>\n";
                echo "<pre style='background: #ffeaa7; padding: 10px;'>" . htmlspecialchars($queue_output) . "</pre>\n";
            }
            ?>
        </div>

        <div class="section">
            <h2>4. DNS Records Check</h2>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>Domain:</strong></td>
                    <td>pandabooth.ro</td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>MX Records:</strong></td>
                    <td>
                        <?php
                        $mx_records = dns_get_mx('pandabooth.ro');
                        if ($mx_records) {
                            foreach ($mx_records as $pri => $host) {
                                echo "$host (Priority: $pri)<br>";
                            }
                        } else {
                            echo "<span class='error'>✗ No MX records found!</span>";
                        }
                        ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td><strong>SPF Record:</strong></td>
                    <td>
                        <?php
                        $txt_records = dns_get_record('pandabooth.ro', DNS_TXT);
                        $spf_found = false;
                        if ($txt_records) {
                            foreach ($txt_records as $record) {
                                if (strpos($record['txt'], 'v=spf1') === 0) {
                                    echo "<span class='ok'>✓ Found</span><br>";
                                    echo "<code>" . htmlspecialchars($record['txt']) . "</code>";
                                    $spf_found = true;
                                }
                            }
                        }
                        if (!$spf_found) {
                            echo "<span class='error'>✗ No SPF record - Gmail will reject emails!</span>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section" style="background: #ffeaa7;">
            <h2>5. Next Steps</h2>
            <ol>
                <li><strong>Test on live server:</strong> Upload this file to pandabooth.ro and test with real email</li>
                <li><strong>Send the test email</strong> above and check your inbox</li>
                <li><strong>If no email arrives:</strong>
                    <ul>
                        <li>Check if SPF record exists (shown above)</li>
                        <li>In cPanel → Email → Email Routing, enable/configure SPF</li>
                        <li>In cPanel → Email → Authentication, set up DKIM</li>
                        <li>Wait 48 hours for DNS propagation</li>
                    </ul>
                </li>
                <li><strong>If mail queue has stuck emails:</strong>
                    <ul>
                        <li>Contact hosting support to flush queue</li>
                        <li>Or SSH: <code>sendmail -q -v</code></li>
                    </ul>
                </li>
            </ol>
        </div>

        <div class="section">
            <h2>6. Test discount code system</h2>
            <p>After fixing email delivery, test the game discount code:</p>
            
            <form method="POST" action="save_discount_code.php">
                <input type="email" name="email" placeholder="your@email.com" required>
                <?php
                $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
                ?>
                <input type="hidden" name="cod_reduceri" value="<?php echo $code; ?>">
                <button type="submit">Test Discount Code</button>
            </form>
        </div>
    </div>
</body>
</html>
