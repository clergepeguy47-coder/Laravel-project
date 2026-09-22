/**
 * Fichier JS principal du projet
 * Chargé automatiquement par Vite dans app.blade.php
 */

// -------------------------
// Bootstrap
// -------------------------
import 'bootstrap';

// -------------------------
// jQuery (nécessaire pour DataTables)
// -------------------------
import $ from 'jquery';
window.$ = $;
window.jQuery = $;

// -------------------------
// DataTables
// -------------------------
import 'datatables.net-bs5';

// -------------------------
// Chart.js
// -------------------------
import Chart from 'chart.js/auto';
window.Chart = Chart;

// -------------------------
// Scripts personnalisés
// -------------------------

// Activation automatique des DataTables
$(document).ready(function () {
    if ($('.table').length) {
        $('.table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            }
        });
    }
});

// Exemple : confirmation avant suppression
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form.confirm-delete');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!confirm("Voulez-vous vraiment supprimer cet élément ?")) {
                e.preventDefault();
            }
        });
    });
});
