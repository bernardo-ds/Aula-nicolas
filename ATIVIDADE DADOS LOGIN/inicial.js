document.addEventListener('DOMContentLoaded', function () {

    const dataConsultaInput = document.getElementById('data-consulta');
    if (dataConsultaInput) {
        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1;
        let dd = today.getDate();

        if (mm < 10) mm = '0' + mm;
        if (dd < 10) dd = '0' + dd;

        const minDate = yyyy + '-' + mm + '-' + dd;
        dataConsultaInput.setAttribute('min', minDate);
    }

    const horariosGrid = document.getElementById('horarios-grid');
    const horarioSelecionadoInput = document.getElementById('horario-selecionado');

    if (horariosGrid) {
        horariosGrid.addEventListener('click', function (e) {
            const target = e.target;
            if (target.classList.contains('btn-horario')) {

                document.querySelectorAll('.btn-horario').forEach(btn => {
                    btn.classList.remove('selected');
                });

                target.classList.add('selected');

                horarioSelecionadoInput.value = target.getAttribute('data-horario');
            }
        });
    }

    const formAgendamento = document.getElementById('form-agendamento');
    if (formAgendamento) {
        formAgendamento.addEventListener('submit', function (e) {
            e.preventDefault();

            const profissionalElement = document.getElementById('profissional');
            const dataElement = document.getElementById('data-consulta');
            const horarioElement = document.getElementById('horario-selecionado');


            if (!horarioElement.value) {
                alert("Por favor, selecione um horário para a consulta.");
                return;
            }
            if (profissionalElement.value === "") {
                alert("Por favor, selecione um profissional.");
                return;
            }


            const dataCompleta = dataElement.value + 'T' + horarioElement.value + ':00';
            const profissionalSelecionado = profissionalElement.value;


            let agendamentos = JSON.parse(localStorage.getItem('agendamentosAgilizaSaude')) || [];

            const conflito = agendamentos.some(agendamento => {

                return agendamento.profissional === profissionalSelecionado && agendamento.horario === dataCompleta;
            });

            if (conflito) {
                alert(`ATENÇÃO: O(A) ${profissionalSelecionado} já possui um agendamento para ${formatarData(dataCompleta)}. Por favor, escolha outro horário ou profissional.`);
                return;
            }

            const novoAgendamento = {
                profissional: profissionalSelecionado,
                horario: dataCompleta,
                id: Date.now(),
            };

            agendamentos.push(novoAgendamento);
            localStorage.setItem('agendamentosAgilizaSaude', JSON.stringify(agendamentos));

            alert(`Consulta agendada com sucesso! \nProfissional: ${novoAgendamento.profissional} \nHorário: ${formatarData(novoAgendamento.horario)}`);
            this.reset();

            document.querySelectorAll('.btn-horario').forEach(btn => {
                btn.classList.remove('selected');
            });
            horarioSelecionadoInput.value = '';
        });
    }


    function formatarData(dataString) {
        if (!dataString) return 'Data/Hora não informada';
        try {
            const data = new Date(dataString);
            if (isNaN(data)) return 'Data inválida';

            const opcoesData = { year: 'numeric', month: 'long', day: 'numeric' };
            const opcoesHora = { hour: '2-digit', minute: '2-digit' };

            const dataFormatada = data.toLocaleDateString('pt-BR', opcoesData);
            const horaFormatada = data.toLocaleTimeString('pt-BR', opcoesHora);

            return `${dataFormatada} às ${horaFormatada}`;

        } catch (error) {
            console.error("Erro ao formatar data:", error);
            return 'Erro na formatação';
        }
    }

    window.exibirConsultas = function () {
        const listaDiv = document.getElementById('lista-consultas');
        if (!listaDiv) return;

        const agendamentos = JSON.parse(localStorage.getItem('agendamentosAgilizaSaude')) || [];

        listaDiv.innerHTML = '';

        if (agendamentos.length === 0) {
            listaDiv.innerHTML = '<p class="mensagem-vazia">Nenhuma consulta agendada ainda.</p>';
            return;
        }

        agendamentos.forEach((agendamento, index) => {
            const card = document.createElement('div');
            card.classList.add('consulta-card');

            card.innerHTML = `
                <h4>Consulta ${index + 1}</h4>
                <p><strong><i class="fas fa-user-md"></i> Profissional:</strong> ${agendamento.profissional}</p>
                <p><strong><i class="fas fa-clock"></i> Data/Hora:</strong> ${formatarData(agendamento.horario)}</p>
            `;
            listaDiv.appendChild(card);
        });
    }

    window.abrirModalConsultas = function () {
        const modal = document.getElementById('minhas-consultas-modal');
        if (modal) {
            modal.style.display = 'flex';
            exibirConsultas();
        }
    }

    window.fecharModalConsultas = function () {
        const modal = document.getElementById('minhas-consultas-modal');
        if (modal) {
            modal.style.display = 'none';
        }
    }
    

});