<template>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Aggiungi</strong> Paziente</h1>

        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label for="name" class="form-label">Nome</label>
                <input
                    type="email"
                    class="form-control"
                    id="name"
                    name="name"
                />
            </div>
            <div class="col-md-6">
                <label for="lastname" class="form-label">Cognome</label>
                <input
                    name="lastname"
                    type="text"
                    class="form-control"
                    id="lastname"
                />
            </div>
            <div class="col-md-6">
                <label for="CF" class="form-label">Codice fiscale</label>
                <input name="CF" type="text" class="form-control" id="CF" />
            </div>
            <div class="col-md-2">
                <label for="sesso" class="form-label">Sesso</label>
                <select id="sesso" name="sesso" class="form-select" aria-label="Default select example">
                    <option value="M" selected>Maschio</option>
                    <option value="F">Femmina</option>
                </select>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="phoneNumber" class="form-label">Telefono</label>
                    <input
                        name="phoneNumber"
                        type="text"
                        class="form-control"
                        id="phoneNumber"
                    />
                </div>
                <div class="col-md-4">
                    <label for="mobilePhone" class="form-label">Mobile</label>
                    <input
                        name="mobilePhone"
                        type="text"
                        class="form-control"
                        id="mobilePhone"
                    />
                </div>
                <div class="col-md-4">
                    <label for="emailAddress" class="form-label">Email</label>
                    <input
                        name="emailAddress"
                        type="text"
                        class="form-control"
                        id="emailAddress"
                    />
                </div>
                <div class="col-4">
                    <label for="inputAddress" class="form-label"
                        >Indirizzo</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="inputAddress"
                        placeholder="1234 Main St"
                    />
                </div>
                <div class="col-4">
                    <label for="inputAddress2" class="form-label"
                        >Address 2</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="inputAddress2"
                        placeholder="Apartment, studio, or floor"
                    />
                </div>
                <div class="col-4">
                    <label for="inputAddress2" class="form-label"
                        >Address 2</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="inputAddress2"
                        placeholder="Apartment, studio, or floor"
                    />
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Città</label>
                    <input type="text" class="form-control" id="inputCity" />
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Nazione</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">CAP</label>
                    <input type="text" class="form-control" id="inputZip" />
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="gridCheck"
                        />
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
