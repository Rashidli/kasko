@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h3>Əmlak Sığortası Məlumatları</h3>
            <a href="{{ route('property.insurances') }}" class="btn btn-secondary mb-3">Geri qayıt</a>

            <div class="card mb-4">
                <div class="card-header">Ümumi Məlumat</div>
                <div class="card-body">
                    <p><strong>Contract №:</strong> {{ $insurance->contractNumber }}</p>
                    <p><strong>Customer:</strong> {{ $insurance->customer->name ?? '-' }}</p>
                    <p><strong>Sığorta şirkəti:</strong> {{ $insurance->insuranceCompanyName }}</p>
                    <p><strong>Sığorta məbləği:</strong> {{ $insurance->sumInsured }} ₼</p>
                    <p><strong>Başlama tarixi:</strong> {{ $insurance->effectiveDate }}</p>
                    <p><strong>Bitmə tarixi:</strong> {{ $insurance->expiryDate }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Əmlak Məlumatları</div>
                <div class="card-body">
                    <p><strong>Registry №:</strong> {{ $insurance->property->registryNumber }}</p>
                    <p><strong>Registration №:</strong> {{ $insurance->property->registrationNumber }}</p>
                    <p><strong>Area:</strong> {{ $insurance->property->propertyArea }} m²</p>
                    <p>
                        <strong>Address:</strong> {{ optional(json_decode($insurance->property->propertyAddress))->address }}
                    </p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Sığortalı Şəxs</div>
                <div class="card-body">
                    <p><strong>Ad Soyad:</strong> {{ $insurance->insuredPerson->fullName }}</p>
                    <p><strong>Doğum Tarixi:</strong> {{ $insurance->insuredPerson->birthDate }}</p>
                    <p><strong>Pin:</strong> {{ $insurance->insuredPerson->pin }}</p>
                    <p><strong>Vəsiqə:</strong> {{ $insurance->insuredPerson->idDocument }}</p>
                    <p><strong>Telefon:</strong> {{ $insurance->insuredPerson->phone }}</p>
                </div>
            </div>

            @if($insurance->operator)
                <div class="card mb-4">
                    <div class="card-header">Operator</div>
                    <div class="card-body">
                        <p><strong>Ad:</strong> {{ $insurance->operator->firstName }}</p>
                        <p><strong>Pin Code:</strong> {{ $insurance->operator->pinCode }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@include('admin.includes.footer')
