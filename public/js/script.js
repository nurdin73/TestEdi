$(document).ready(function () {
    $('.addEducation').on('click', function(e) {
        e.preventDefault()
        const html = `
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level[]">Jenjang pendidikan</label>
                                <input type="text" name="level[]" id="level[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_institution[]">Nama Institusi</label>
                                <input type="text" name="name_institution[]" id="name_institution[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="major[]">Jurusan</label>
                                <input type="text" name="major[]" id="major[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_graduate[]">Tahun lulus</label>
                                <input type="text" name="date_graduate[]" id="date_graduate[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="grading[]">Nilai(IPK)</label>
                                <input type="text" name="grading[]" id="grading[]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-danger deleteEducation">Hapus</button>
                </div>
            </div>
        `
        $('.educations').append(html)
    })   
    
    $('.educations').on('click', '.deleteEducation', function(e) {
        e.preventDefault()
        const parent = $(this).parent().parent().remove()
    })

    $('.addTraining').on('click', function(e) {
        e.preventDefault()
        const html = `
        <div class="card my-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name_training[]">Nama kursus/seminar</label>
                            <input type="text" name="name_training[]" id="name_training[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cert[]">Sertifikat</label>
                            <select name="cert[]" id="cert[]" class="form-select">
                                <option value="true">Ya</option>
                                <option value="false">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date[]">Tahun</label>
                            <input type="text" name="date[]" id="date[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-danger deleteTraining">Hapus</button>
            </div>
        </div>
        `
        $('.trainings').append(html)
    })

    $('.trainings').on('click', '.deleteTraining', function(e) {
        e.preventDefault()
        const parent = $(this).parent().parent().remove()
    })

    $('.addExperience').on('click', function(e) {
        e.preventDefault()
        const html = `
        <div class="card my-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name_employer[]">Nama Perusahaan</label>
                            <input type="text" name="name_employer[]" id="name_employer[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="position_work[]">Posisi terakhir</label>
                            <input type="text" name="position_work[]" id="position_work[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="salary[]">Pendapatan terakhir</label>
                            <input type="text" name="salary[]" id="salary[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="year[]">Tahun</label>
                            <input type="text" name="year[]" id="year[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-danger deleteExperience">Hapus</button>
            </div>
        </div>
        `

        $('.experiences').append(html)
    })

    $('.experiences').on('click', '.deleteExperience', function(e) {
        e.preventDefault()
        $(this).parent().parent().remove()
    })
});

