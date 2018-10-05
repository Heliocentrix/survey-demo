export class Survey<T> {
  id: number;
  name: string;
  category_id: number;
  description: string;
  survey_type_id: number;
  survey_questions: any;
  update_at: string;
  created_at: string;

  constructor(questions: {
    id?: number,
    question_id?: number,
    title?: string,
    question_type?: string,
    question_category?: string,
    update_at?: string,
    created_at?: string,

    } = {}) {
    // this.id = survey_questions.question_id;
  }
}
