

    

            




              





                <div class="col-md-4">
                    <div class="stat-card" style="border-top-color: #fb8c00;">


                        <?php 
         
          $sql2 =  "SELECT COUNT(*) AS consultas_agendadas FROM consultas_agendadas";
          $result2 = mysqli_query($mysqli4, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $consultas_agendadas = $row2["consultas_agendadas"];
                
                ?>           
                        <div class="stat-icon text-warning"><i class="fas fa-comment-medical"></i></div>
                        <div class="stat-info"><h6>Consultas atendidas</h6><h2><span class="badge badge-number" class=" color-black" ><?php echo $consultas_agendadas;?></span></h2></div>
                    </div>


<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

?>          
                </div>

         
                <div class="col-md-4">
                    <div class="stat-card" style="border-top-color: #ab47bc;">
            <?php 
         
          $sql2 =  "SELECT COUNT(*) AS consultas_demarcadas FROM consultas_demarcadas";
          $result2 = mysqli_query($mysqli4, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $consultas_demarcadas = $row2["consultas_demarcadas"];
                
                ?> 

                        <div class="stat-icon text-danger"><i class="fas fa-ban"></i></div>
                        <div class="stat-info"><h6>Consultas canceladas</h6><h2><span class="badge badge-number" class=" color-black" ><?php echo $consultas_demarcadas;?></span></h2></div>
                    </div>




<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

?>

            </div>

        


     </div>
        </div>


    
<!-- Row de Gráficos -->
            <div class="row">


                <div class="col-md-5">
                    <div class="content-card">
            
             <h5 class="">Consultas de cada mês</h5>

              <!-- Bar Chart -->
              <canvas id="graficoLinha" style="max-height: 400px; display: block; box-sizing: border-box; height: 220px; width: 438px;" width="438" height="219">
                
              </canvas>
 <?php 
          $sql5 =  "SELECT MONTH(data_horario) as mes, COUNT(*) as total FROM consultas_canceladas GROUP BY mes ";
          $result5 = mysqli_query($mysqli5, $sql5);

          $meses_label = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
          $dados_meses = array_fill(0, 12, 0);

            if($result5 && $result5->num_rows > 0) {
                $row5 = $result5->fetch_assoc();
                
               // $totalConsultas = $row5["total_consultas"];
               // $mes = date('M');

                 $dados_meses[$row5['mes'] - 1] = $row5['total'];

                ?>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#graficoLinha'), {
                    type: 'line',
                    data: {
                      labels: <?php echo json_encode($meses_label); ?>,
                      datasets: [{
                        label: 'Mostrar Linhas',
                        data:<?php echo json_encode($dados_meses); ?>,
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->
<?php
        
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli4->close();
?>
                    </div>
                </div>
            </div>



                <div class="col-md-7">
                    <div class="content-card">
                      <h5>Totais</h5>

              <!-- Pie Chart -->
              <div id="pieChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: [<?php echo $consultas_agendadas;?>, <?php echo $consultas_demarcadas;?>, <?php echo $consultas_canceladas;?>, <?php echo $consultas_atendidas;?>],
                    chart: {
                      height: 242,
                      type: 'pie',
                      toolbar: {
                        show: false
                      }
                    },
                    labels: ['Total consultas agendadas', 'Total consultas desmarcadas', 'Total consultas canceladas', 'Total consultas atendidas', ]
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

                    </div>
                </div>

            <!-- Row de Alertas e Faturação -->
            <div class="row">
                <div class="col-md-6">
                    <div class="content-card">
                        <h6 class="card-title"><i class="fas fa-bell text-warning me-2"></i>Avisos Críticos e Alertas</h6>
                        <ul class="list-group list-group-flush table-custom">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-circle text-warning me-2 small"></i> Contrato a Expira: Dra. Ana Costa</span>
                                <span class="badge-status bg-active">Status</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-circle text-primary me-2 small"></i> Material Crítico: Kit Vacinação</span>
                                <span class="badge-status bg-active">Status</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-circle text-danger me-2 small"></i> Gerenciar Renovação de Licença...</span>
                                <span class="badge-status bg-pending">Pendente</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-card">
                        <h6 class="card-title">Visão Geral de Faturação</h6>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <script>
        // Configuração Gráfico de Pizza
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: ['Médicos', 'Utentes', 'Consultas'],
                datasets: [{
                    data: [3, 6, 45],
                    backgroundColor: ['#42a5f5', '#66bb6a', '#ffa726']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Configuração Gráfico de Linha
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Consultas',
                    data: [5, 28, 15, 0, 0, 0],
                    borderColor: '#ab47bc',
                    tension: 0.1,
                    fill: false
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Configuração Gráfico de Barras
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Faturação Mensal',
                    data: [8000, 25000, 20000, 18000, 22000, 23000],
                    backgroundColor: '#29b6f6'
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    </script>
<!---INICIO MODAL PERFIL -->

      <div  class="modal fade" id="meu_perfil" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-ms">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Seus Dados</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

         <div class="container" >
          
          <?php

          $result_pesq = "SELECT * FROM Admin";
            $resultado_pesquisa = mysqli_query($mysqli4, $result_pesq);
          
        while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
          if ($rows_pesquisar['nome'] == $nome) {
          
        ?>

                <div style="margin: 10px 40%">
                <h1 class="bi-person-circle" ></h1></div>
                <hr>
                
                 <label hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></label><br>
                 <label>Nome: <?php echo $rows_pesquisar['nome']; ?></label><br>    
                 <label>Email: <?php echo $rows_pesquisar['email']; ?></label><br>    
                 <label>BI: <?php echo $rows_pesquisar['BI']; ?></label><br>    
                 <label>Telefone: <?php echo $rows_pesquisar['telefone']; ?></label><br>    
                 <label>Endereço: <?php echo $rows_pesquisar['endereco']; ?></label><br>
                 <label>Nome Sistema: <?php echo $rows_pesquisar['nome_sistema']; ?></label><br>
                        <hr>
                        <br>
            <?php

           $id = encryptor('encrypt', $rows_pesquisar['id']); 
            ?>
            <div class='container'>
               <a  href="meu_perfil_admin.php?id=<?php echo $id; ?>" id="button"  class="action-card_submit" >Editar</a>
          </div>
        <?php
          }

       }
    ?>         
         </div>

                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PERFIL -->



             <!---INICIO MODAL QUESTÃO -->

      <div  class="modal fade" id="questoes" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <br>
                  <br>
                  <br>
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Cadastro Questões</h5>
                     <label style=" margin-left: 20px">Campos Obrigatórios </label>(<span style="color: red">*</span>)
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

   <?php
        $result_pesq = "SELECT * FROM medico";
            $resultado_pesquisa = mysqli_query($mysqli4, $result_pesq);
          
   ?>
        <form action="" method="POST">
     
   
        <div class="row">

           <div class="col-md-6 form-group mt-3 mt-md-0">
              <label>Especialidade  </label>(<span style="color: red">*</span>)
                   
                   <select id="selecioneEspecialidade" name="especialidade" class="form-select" onchange="selecione();" required>
                    <option value="">Selecione a Especialidade</option>
                 <?php
                    while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
                 ?>

                   <option  value="<?php echo $rows_pesquisar['especialidade']; ?>" ><?php echo $rows_pesquisar['especialidade']; ?></option>
                 <?php
                  }
                  ?>             
                   </select>
                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
             </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
              <label>Questões </label>(<span style="color: red">*</span>)
               
             <input type="checkbox" name="checkbox" hidden="">

              <input type="text" name="questao" class="form-control" id="questao" placeholder="questao" required value="">

              <input type="text" name="acrescentar" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent" hidden="">    

                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a questão!</div>
             </div>
              </div>
        <br>
      <div>
            <input  type="submit" id="button" class="btn btn-success w-25" style="border-radius: 0px; float: right;" value="Guardar Respostas" name="button"/>
      </div>

    </form>
             </div>
            </div>
           </div>
          </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL QUESTÃO -->

  
 <!---INICIO MODAL PARA PARA SAIR  -->

      <div  class="modal fade" id="Pergunta_Sair" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-ms">
                
                  <div class="modal-content" style="margin-top: 250px;">
                    
                    <div  class="modal-body">

                <div class="container" >
            
              <div>
                <h3>Pretende Sair do Sistema?</h3></div>
                <hr>
               

           
            <div class='container'>
           
     
                 <a type="submit" href="?action=sair" id="button"  class="btn btn-danger" style="width: 150px; height: 35px; border-radius: 0px; float: right;" >Sim</a>
          
                <a class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 150px; height: 35px; border-radius: 0px; float: left;">Não</a>
            </div>
          
        </div>

         </div>
        </div>
       </div>
      </div>
        <!---FIM MODAL PARA SAIR -->