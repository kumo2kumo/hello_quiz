<template>
  <div>
    <the-header></the-header>
    <main>
      <div class="container">
        <article class="col-md-8 col-xs-12">
          <section>
            <h2 class="quiz-question-h2">
              <img src="/images/what-is-mark.png" class="quiz-question__logo">
              第{{ quizNumber }}問
            </h2>
            <p>{{ title }}</p>
            <div v-if="imageSrc">
              <img :src="'/image/quiz/' + imageSrc" class="img-responsive" id="quiz-image">
            </div>
            <div class="quiz-answer__list">
              <!-- TODO ボタンを押したらisAlreadyAnsweredをtrueにする→正解、解説を表示する -->
              <ul>
                <li v-for="(answer, index) in answers" :key="index">
                  <a>
                    <button  :disabled="isAlreadyAnswered">{{ index + 1 }}</button>
                  </a>
                  {{ answer }}
                </li>
              </ul>
            </div>
            <div class="text-right">カテゴリー：{{ categoryName }}</div>
          </section>

          <section>
            <h2 class="quiz-correct-h2">
              <img class="quiz-correct__logo" src="/images/correct-mark.png" />正解は…
            </h2>
            <p> <button class="quiz-correct-answer" v-show="isAlreadyAnswered" disabled>{{ correctAnswerNo }}</button></p>
            <button v-show="!isAlreadyAnswered">正解を表示する</button>
            <!-- TODO 正解は不正解か表示 -->
            <div class="alert alert-info" v-show="isCorrect">
              <strong>正解!</strong>
            </div>
            <div class="alert alert-danger" v-show="isMistake">
              <strong>不正解!</strong>
            </div>
          </section>

          <section>
            <h2 class="quiz-commentary-h2">
                <img class="quiz-commentary__logo" src="/images/commentary-mark.png" />解説
            </h2>
            <div class="quiz-commentary__text" v-show="isAlreadyAnswered" style="white-space:pre-wrap; word-wrap: break-word;">
              {{ commentary }}
            </div>
            <button type="button" class="btn btn-primary center-block">次の問題へ</button>
            <button type="button" class="center-block" data-toggle="modal" data-target="#modal-result" v-if="isQuizFinish">結果を見る</button>
          </section>
        </article>

        <the-sidebar></the-sidebar>

      </div>
    </main>

    <the-footer></the-footer>

  </div>
</template>

<script>
import TheHeader from "../layout/TheHeader";
import TheFooter from "../layout/TheFooter";
import TheSidebar from "../layout/TheSideber";


export default {
  components: {
    TheFooter,
    TheHeader,
    TheSidebar,
  },

  data(){
    return {
      quizData:[],
      quizNumber: 1,
      answers: [],
      title: "",
      imageSrc: "",
      categoryName: "",
      correctAnswerNo: 0,
      isCorrect: false,
      isMistake: false,
      isAlreadyAnswered: false,
      isQuizFinish: false,
      commentary: "",
      score: 0,
    }
  },

  mounted(){
    const categories = this.$route.query.categories;
    this.$http.get("/api/quiz?categories=${categories}").then(response => {
      this.quizData = response.data;
      this.findNextQuiz(0);
      console.log(this.quizData);
    });
  },

  methods: {
    findNextQuiz(quizNumber){
      this.title = this.quizData[quizNumber].title;
      this.answers = [
        this.quizData[quizNumber].answer.answer_1,
        this.quizData[quizNumber].answer.answer_2,
        this.quizData[quizNumber].answer.answer_3,
        this.quizData[quizNumber].answer.answer_4,
      ];
      this.categoryName = this.quizData[quizNumber].category.name;
      this.correctAnswerNo =  this.quizData[quizNumber].answer.correct_answer;
      this.commentary = his.quizData[quizNumber].answer.commentary;
    }
  }
}
</script>