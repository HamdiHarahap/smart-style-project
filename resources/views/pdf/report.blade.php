<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Style Reports</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
        h1 { text-align: center; font-size: 24px }
    </style>
</head>
<body>
    <h1>Hair Style Recommendations Report</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Hair Type</th>
                <th>Face Shape</th>
                <th>Activity</th>
                <th>Hair Style</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->nama_user }}</td>
                    <td>{{ $report->email }}</td>
                    <td>{{ $report->rule->hairType->nama ?? '-' }}</td>
                    <td>{{ $report->rule->faceShape->nama ?? '-' }}</td>
                    <td>{{ $report->rule->activity->nama ?? '-' }}</td>
                    <td>{{ $report->rule->hairStyle->nama ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
