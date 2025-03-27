<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Devis OFPPT</title>
    <style>
        @page {
            margin: 10mm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: white;
            color: #2d3748;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .logo-container {
            text-align: left;
            margin-bottom: 1rem;
        }
        .logo {
            width: 12rem;
            height: auto;
        }
        .recipient {
            text-align: center;
            margin: 2rem 0;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        .info-table th, .info-table td {
            border: 1px solid #000;
            padding: 0.5rem;
            text-align: center;
        }
        .info-table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .object {
            margin-bottom: 1rem;
            font-style: italic;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        .details-table th, .details-table td {
            border: 1px solid #000;
            padding: 0.5rem;
        }
        .details-table th {
            background-color: #e6e6e6;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
        }
        .remarque-section {
        margin-top: 1.5rem;
        margin-bottom: 2rem;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d1d1;
        background-color: #f9f9f9;
        border-radius: 4px;
    }
    
    .remarque-title {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: bold;
        font-size: 1rem;
        color: #333;
        text-decoration: underline;
    }
    
    .remarque-text {
        margin: 0;
        font-size: 0.9rem;
        line-height: 1.4;
        color: #444;
        font-style: italic;
    }
        .signature-box {
            width: 41.666667%;
            border-top: 1px solid #1a202c;
            padding-top: 0.5rem;
            text-align: center;
        }
        .signature-name {
            font-size: 0.875rem;
        }
        .enterprise-header {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .individual-header {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .footer {
            text-align: center;
            font-size: 0.75rem;
            color: #718096;
            margin-top: 3rem;
            padding-top: 0.75rem;
            border-top: 1px solid #d1d5db;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #d1d5db;
        }
        .header-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 16rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Access user directly from auth -->
    @php
        $user = auth()->user();
        $isEnterprise = strtolower($user->status) === 'entreprise';
    @endphp

    <!-- Header with OFPPT Logo -->
     <!-- Header with OFPPT Logo -->
     <div class="header">
        <div class="header-content">
            <img src="{{ url('images/logos/ofppt.logo.png') }}" alt="OFPPT Logo" class="logo">
            <div class="company-name">OFPPT</div>
            <div class="company-description">l'Office de la formation professionnelle et de la promotion du Travail</div>
        </div>
    </div>
    
    <!-- Recipient Header -->
    <div class="recipient">
        A
        <br>
        @if($isEnterprise)
        Monsieur le directeur d'ENTREPRISE {{ $user->name ?? 'X' }}
        @else
        Monsieur/Madame {{ $user->nom ?? $user->name }} {{ $user->prenom ?? '' }}
        @endif
    </div>
    
    <!-- Info Table -->
    <table class="info-table">
        <tr>
            <th>Institution</th>
            <th>Devis N°</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>
                @if($isEnterprise)
                ENTREPRISE {{ $user->name ?? 'X' }}
                @else
                {{ $user->nom ?? $user->name }} {{ $user->prenom ?? '' }}
                @endif
            </td>
            <td>{{ $reference ?? date('m/Y') }}</td>
            <td>{{ $lieu ?? 'Béni Mellal' }}, le {{ $date ?? date('d/m/Y') }}</td>
        </tr>
    </table>
    
    <!-- Object Section -->
    <div class="object">
        <strong>Objet :</strong> {{ $objet ?? 'Formation professionnelle' }}
    </div>
    
    <!-- Details Table -->
    <table class="details-table">
        <tr>
            <th>N° Art</th>
            <th>Désignation</th>
            <th>Nombre de Personnes</th>
        </tr>
        
        @foreach($formations as $index => $formation)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $formation['formation_name'] }}</td>
            <td>{{ $formation['participants'] }}</td>
        </tr>
        @endforeach
    </table>
    <div class="remarque-section">
        <h4 class="remarque-title">Remarque :</h4>
        <p class="remarque-text">
            La durée et le prix de la formation seront convenus dans l'institution selon les besoins spécifiques et les objectifs pédagogiques. Veuillez consulter notre équipe sur place pour plus de détails concernant ces aspects.
        </p>
    </div>
    <!-- Signature Section -->
    <div class="signature-section">
        <div class="signature-box">
            <p>Signature du demandeur</p>
            <p class="signature-name">{{ ($user->prenom ?? '') . ' ' . ($user->nom ?? '') }}</p>
        </div>
        <div class="signature-box">
            <p>Signature du responsable OFPPT</p>
        </div>
    </div>
        <!-- Footer -->
    <div class="footer">
        <p>OFPPT - l'Office de la formation professionnelle et de la promotion du Travail</p>
        <p>Adresse: IFMSAS, Beni Mellal - Téléphone: 05-XX-XX-XX-XX - Email: contact@ofppt.ma</p>
    </div>

</body>
</html>