<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color:#333; line-height:1.5; }
        .header { background:#0869b6; color:#fff; padding:15px; text-align:center; }
        .section { margin:20px 0; border:1px solid #ddd; border-radius:6px; }
        .section h3 { background:#f5f5f5; margin:0; padding:10px; border-bottom:1px solid #ddd; color:#0869b6; }
        .section table { width:100%; border-collapse:collapse; }
        .section td { padding:8px 12px; border-bottom:1px solid #eee; vertical-align:top; }
        .section tr:last-child td { border-bottom:none; }
        .field-label { font-weight:bold; color:#444; width:30%; }
        .muted { color:#777; font-size:12px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>📩 New Enquiry Received</h2>
    </div>

    <!-- Contact Info -->
    <div class="section">
        <h3>👤 Contact Information</h3>
        <table>
            <tr><td class="field-label">Name</td><td>{{ $enquiry->name }}</td></tr>
            <tr><td class="field-label">Email</td><td>{{ $enquiry->email }}</td></tr>
            <tr><td class="field-label">Phone</td><td>{{ $enquiry->phone ?? '-' }}</td></tr>
            <tr><td class="field-label">Country</td><td>{{ $enquiry->country }}</td></tr>
            <tr><td class="field-label">Company</td><td>{{ $enquiry->company ?? '-' }}</td></tr>
            <tr><td class="field-label">Job Title</td><td>{{ $enquiry->role ?? '-' }}</td></tr>
        </table>
    </div>

    <!-- Training Details -->
    <div class="section">
        <h3>📘 Training Details</h3>
        <table>
            <tr><td class="field-label">Course</td><td>{{ $enquiry->course }}</td></tr>
            <tr><td class="field-label">Funding</td><td>{{ ucfirst($enquiry->funding) ?? '-' }}</td></tr>
            <tr><td class="field-label">Group Size</td><td>{{ $enquiry->group_size ?? '-' }}</td></tr>
            <tr><td class="field-label">Delivery Mode</td><td>{{ $enquiry->delivery_mode ?? '-' }}</td></tr>
            <tr><td class="field-label">Start Timeline</td><td>{{ $enquiry->start_timeline ?? '-' }}</td></tr>
            <tr><td class="field-label">Budget Range</td><td>{{ $enquiry->budget_range ?? '-' }}</td></tr>
            <tr><td class="field-label">Need Quote</td><td>{{ $enquiry->need_quote ? 'Yes' : 'No' }}</td></tr>
        </table>
    </div>

    <!-- Communication Preferences -->
    <div class="section">
        <h3>📞 Communication Preferences</h3>
        <table>
            <tr><td class="field-label">Preferred Channel</td><td>{{ $enquiry->contact_channel ?? '-' }}</td></tr>
            <tr><td class="field-label">Best Time</td><td>{{ $enquiry->contact_time ?? '-' }}</td></tr>
            <tr><td class="field-label">Heard About Us</td><td>{{ $enquiry->heard_about ?? '-' }}</td></tr>
            <tr><td class="field-label">Message</td><td>{{ $enquiry->message ?? '-' }}</td></tr>
        </table>
    </div>

    <!-- GDPR & Consents -->
    <div class="section">
        <h3>✅ Consents</h3>
        <table>
            <tr><td class="field-label">Consent</td><td>{{ $enquiry->consent ? '✔️ Given' : '❌ Not Given' }}</td></tr>
            <tr><td class="field-label">Marketing Opt-in</td><td>{{ $enquiry->marketing_opt_in ? '✔️ Yes' : '❌ No' }}</td></tr>
        </table>
    </div>

    <!-- Tracking -->
    <div class="section">
        <h3>📊 Tracking Info</h3>
        <table>
            <tr><td class="field-label">URL</td><td>{{ $enquiry->url ?? '-' }}</td></tr>
            <tr><td class="field-label">UTM Source</td><td>{{ $enquiry->utm_source ?? '-' }}</td></tr>
            <tr><td class="field-label">UTM Medium</td><td>{{ $enquiry->utm_medium ?? '-' }}</td></tr>
            <tr><td class="field-label">UTM Campaign</td><td>{{ $enquiry->utm_campaign ?? '-' }}</td></tr>
            <tr><td class="field-label">UTM Term</td><td>{{ $enquiry->utm_term ?? '-' }}</td></tr>
            <tr><td class="field-label">UTM Content</td><td>{{ $enquiry->utm_content ?? '-' }}</td></tr>
        </table>
    </div>

    <!-- Client Info -->
    <div class="section">
        <h3>🖥️ Client Info</h3>
        <table>
            <tr><td class="field-label">IP Address</td><td>{{ $enquiry->ip_address ?? '-' }}</td></tr>
            <tr><td class="field-label">Browser / User Agent</td><td>{{ $enquiry->user_agent ?? '-' }}</td></tr>
            <tr><td class="field-label">Device</td><td>{{ $enquiry->device ?? '-' }}</td></tr>
        </table>
    </div>

    <p class="muted">
        This enquiry was submitted via <strong>xcademia.com</strong> at {{ $enquiry->created_at->format('d M Y H:i') }}
    </p>
</body>
</html>
