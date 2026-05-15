<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New consultation request</title>
</head>
<body style="font-family: sans-serif; font-size: 14px; color: #333; max-width: 600px; margin: 0 auto; padding: 24px;">
    <h2 style="margin-top: 0;">New consultation request</h2>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px 0; color: #666; width: 140px;">Name</td>
            <td style="padding: 8px 0; font-weight: 600;">{{ $consultation->name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; color: #666;">Company</td>
            <td style="padding: 8px 0; font-weight: 600;">{{ $consultation->company_name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; color: #666;">Email</td>
            <td style="padding: 8px 0;"><a href="mailto:{{ $consultation->email }}">{{ $consultation->email }}</a></td>
        </tr>
        <tr>
            <td style="padding: 8px 0; color: #666;">Phone</td>
            <td style="padding: 8px 0;">{{ $consultation->phone ?: '—' }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; color: #666;">Company size</td>
            <td style="padding: 8px 0;">{{ $consultation->company_size }} people</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; color: #666;">Looking to</td>
            <td style="padding: 8px 0;">{{ $consultation->intent }}</td>
        </tr>
        @if($consultation->message)
        <tr>
            <td style="padding: 8px 0; color: #666; vertical-align: top;">Message</td>
            <td style="padding: 8px 0;">{{ $consultation->message }}</td>
        </tr>
        @endif
    </table>

    <p style="margin-top: 24px; color: #999; font-size: 12px;">
        Submitted {{ $consultation->created_at->format('d M Y H:i') }} · IP {{ $consultation->ip_address }}
    </p>
</body>
</html>
